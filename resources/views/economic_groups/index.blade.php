@extends('layouts.main_layout')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white">Grupos Econômicos</h2>
        <a href="{{ route('economic-groups.create') }}" class="btn btn-success">Criar Novo Grupo Econômico</a>
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
                    <th>Nome</th>
                    <th>Data de Criação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($economicGroups as $group)
                    <tr>
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->created_at->format('d/m/Y') }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('economic-groups.edit', $group) }}" class="btn btn-sm btn-warning me-2">Editar</a>
                            <form action="{{ route('economic-groups.destroy', $group) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-muted">Nenhum grupo econômico encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
