@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Worker create</h1>

    <form method="post" action="{{ route('worker.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Working name"
                   value="{{ old('name') }}">
            @error('name')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Surname</label>
            <input name="surname" type="text" class="form-control" id="surname" placeholder="Working surname"
                   value="{{ old('surname') }}">
            @error('surname')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input name="age" type="number" class="form-control" id="age" placeholder="Working age"
                   value="{{ old('age') }}">
            @error('age')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Working email"
                   value="{{ old('email') }}">
            @error('email')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3"
                      placeholder="Description">{{ old('description') }}</textarea>
            @error('description')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input name="is_married" type="checkbox" class="form-check-input"
                   id="is_married" {{ old('is_married') ? 'checked' : '' }}>
            <label class="form-check-label" for="is_married">Is married</label>
            @error('is_married')
            <p style="color: red">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection
