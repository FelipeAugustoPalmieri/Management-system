@extends('layouts.main_layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-white mb-4">Create New Economic Group</h2>
    <div class="card bg-dark text-white p-4">
        <form action="{{ route('economic-groups.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success me-2">Submit</button>
                <a href="{{ route('economic-groups.index') }}" class="btn btn-secondary">Return</a>
            </div>
        </form>
    </div>
</div>
@endsection
