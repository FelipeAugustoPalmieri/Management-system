@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h1>Grupos Econômicos</h1>
    <a href="{{ route('economic-groups.create') }}" class="btn btn-primary mb-3">Criar Novo Grupo Econômico</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
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
                    <td>
                        <a href="{{ route('economic-groups.edit', $group) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('economic-groups.destroy', $group) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum grupo econômico encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
