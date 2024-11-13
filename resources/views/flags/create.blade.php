@extends('layouts.main_layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-white mb-4">Create New Flag</h2>
    <div class="card bg-dark text-white p-4">
        <form action="{{ route('flags.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="economic_group_id" class="form-label">Economic Group</label>
                <select class="form-control" id="economic_group_id" name="economic_group_id" required>
                    @foreach($economicGroups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('economic_group_id'))
                    <div class="text-danger">{{ $errors->first('economic_group_id') }}</div>
                @endif
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success me-2">Submit</button>
                <a href="{{ route('flags.index') }}" class="btn btn-secondary">Return</a>
            </div>
        </form>
    </div>
</div>
@endsection
