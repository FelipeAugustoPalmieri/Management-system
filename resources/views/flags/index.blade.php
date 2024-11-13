@extends('layouts.main_layout')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white">List of Flags</h2>
        <a href="{{ route('flags.create') }}" class="btn btn-success">Create New Flag</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-dark table-hover text-center">
            <thead class="table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Economic Group</th>
                    <th>Creation Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($flags as $flag)
                    <tr>
                        <td>{{ $flag->id }}</td>
                        <td>{{ $flag->name }}</td>
                        <td>{{ $flag->economicGroup->name }}</td>
                        <td>{{ $flag->created_at->format('d/m/Y') }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('flags.edit', $flag) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                            <form action="{{ route('flags.destroy', $flag) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-muted">No flag found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
