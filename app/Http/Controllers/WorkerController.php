<?php

namespace App\Http\Controllers;

use App\Http\Requests\Worker\StoreWorkerRequest;
use App\Http\Requests\Worker\UpdateWorkerRequest;
use App\Models\Worker;
use Illuminate\View\View;

class WorkerController extends Controller
{
    public function index(): View
    {
        $workers = Worker::query()->paginate(10);
        return view('worker.index', compact('workers'));
    }

    public function create(): View
    {
        return view('worker.create');
    }

    public function store(StoreWorkerRequest $request)
    {
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        Worker::create($data);
        return redirect()->route('worker.index');
    }

    public function show(Worker $worker)
    {
        return view('worker.show', compact('worker'));
    }

    public function edit(Worker $worker)
    {
        return view('worker.edit', compact('worker'));
    }

    public function update(UpdateWorkerRequest $request, Worker $worker)
    {
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        $worker->update($data);
        return redirect()->route('worker.show', $worker);
    }

    public function destroy(Worker $worker)
    {
        $worker->delete();
        return redirect()->route('worker.index');
    }
}
