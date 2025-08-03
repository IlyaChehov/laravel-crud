<?php

namespace App\Http\Controllers;

use App\Http\Requests\Worker\QueryWorkerRequest;
use App\Http\Requests\Worker\StoreWorkerRequest;
use App\Http\Requests\Worker\UpdateWorkerRequest;
use App\Models\Worker;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class WorkerController extends Controller
{
    public function index(QueryWorkerRequest $request): View
    {
        $queryData = $request->validated();
        $queryWorker = Worker::query();

        if (isset($queryData['name'])) {
            $queryWorker->where('name', 'like', "%{$queryData['name']}%");
        }

        if (isset($queryData['surname'])) {
            $queryWorker->where('surname', 'like', "%{$queryData['surname']}%");
        }

        if (isset($queryData['to'])) {
            $queryWorker->where('age', '<', $queryData['to']);
        }

        if (isset($queryData['from'])) {
            $queryWorker->where('age', '>', $queryData['from']);
        }

        if (isset($queryData['email'])) {
            $queryWorker->where('email', 'like', "%{$queryData['email']}%");
        }

        if (isset($queryData['is_married'])) {
            $queryWorker->where('is_married', '=', true);
        }

        $workers = $queryWorker->paginate(10);

        return view('worker.index', compact('workers'));
    }

    public function create(): View
    {
        return view('worker.create');
    }

    public function store(StoreWorkerRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        Worker::create($data);
        return redirect()->route('worker.index');
    }

    public function show(Worker $worker): View
    {
        return view('worker.show', compact('worker'));
    }

    public function edit(Worker $worker): View
    {
        return view('worker.edit', compact('worker'));
    }

    public function update(UpdateWorkerRequest $request, Worker $worker): RedirectResponse
    {
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        $worker->update($data);
        return redirect()->route('worker.show', $worker);
    }

    public function destroy(Worker $worker): RedirectResponse
    {
        $worker->delete();
        return redirect()->route('worker.index');
    }
}
