@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h1>Lista de Colaboradores</h1>
    <a href="{{ route('collaborators.create') }}" class="btn btn-primary mb-3">Criar Novo Colaborador</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Unidade</th>
                <th>Data de Criação</th>
                <th>Ações</th>
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
                    <td>
                        <a href="{{ route('collaborators.edit', $collaborator) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('collaborators.destroy', $collaborator) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Nenhum colaborador encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
