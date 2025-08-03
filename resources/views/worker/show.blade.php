@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Worker: {{ $worker->name }}</h1>

    <table class="table mb-5">
        <thead>
        <tr>
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
            <tr>
                <td>{{ $worker->name }}</td>
                <td>{{ $worker->surname }}</td>
                <td>{{ $worker->age }}</td>
                <td>{{ $worker->email }}</td>
                <td>{{ $worker->description }}</td>
                <td>{{ $worker->is_married ? 'Yes' : 'No' }}</td>
                <td>{{ $worker->created_at }}</td>
                <td><a href="{{ route('worker.edit', $worker) }}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('worker.destroy', $worker) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('worker.index') }}" class="btn btn-primary">Back</a>
@endsection
