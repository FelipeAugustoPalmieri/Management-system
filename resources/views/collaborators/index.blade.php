@extends('layouts.main_layout')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white">List of Contributors</h2>
        <a href="{{ route('collaborators.create') }}" class="btn btn-success">Create New Collaborator</a>
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
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Unit</th>
                    <th>Creation Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($collaborators as $collaborator)
                    <tr>
                        <td>{{ $collaborator->id }}</td>
                        <td>{{ $collaborator->name }}</td>
                        <td>{{ $collaborator->email }}</td>
                        <td>{{ $collaborator->cpf }}</td>
                        <td>{{ $collaborator->unit->fantasy_name }}</td>
                        <td>{{ $collaborator->created_at->format('d/m/Y') }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('collaborators.edit', $collaborator) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                            <form action="{{ route('collaborators.destroy', $collaborator) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar?')" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-muted">No collaborators found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
