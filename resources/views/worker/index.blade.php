@extends('layouts.main')

@section('content')

    <button class="btn btn-primary mb-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
            aria-controls="offcanvasScrolling"><i class="bi bi-funnel"></i>
    </button>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
         id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Filters</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="get" action="{{ route('worker.index') }}">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Working name"
                           value="{{ request()->get('name') }}">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    <input name="surname" type="text" class="form-control" id="surname" placeholder="Working surname"
                           value="{{  request()->get('surname') }}">
                </div>
                <div class="mb-3">
                    <label for="to" class="form-label">Age to</label>
                    <input name="to" type="number" class="form-control" id="to" placeholder="Working age to"
                           value="{{  request()->get('to') }}">
                </div>
                <div class="mb-3">
                    <label for="from" class="form-label">Age from</label>
                    <input name="from" type="number" class="form-control" id="from" placeholder="Working age from"
                           value="{{  request()->get('from') }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="text" class="form-control" id="email" placeholder="Working email"
                           value="{{  request()->get('email') }}">
                </div>
                <div class="mb-3 form-check">
                    <input name="is_married" type="checkbox" class="form-check-input"
                           id="is_married" {{  request()->get('is_married') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_married">Is married</label>
                </div>
                <button type="submit" class="btn btn-info">Search</button>
                <a class="btn btn-danger" href="{{ route('worker.index') }}">Reset</a>
            </form>
        </div>
    </div>

    <h1 class="mb-4">Workers list</h1>

    @empty($workers)
        <h2>Not workers...</h2>
    @endempty

    @if(!empty($workers))
        <table class="table mb-5">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Age</th>
                <th scope="col">Email</th>
                <th scope="col">Description</th>
                <th scope="col">Is married</th>
                <th scope="col">Creation date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($workers as $worker)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $worker->name }}</td>
                    <td>{{ $worker->surname }}</td>
                    <td>{{ $worker->age }}</td>
                    <td>{{ $worker->email }}</td>
                    <td>{{ $worker->description }}</td>
                    <td>{{ $worker->is_married ? 'Yes' : 'No' }}</td>
                    <td>{{ $worker->created_at }}</td>
                    <td><a href="{{ route('worker.show', $worker) }}" class="btn btn-info">Show</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $workers->withQueryString()->links() }}
        </div>

    @endif
@endsection
