@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h1>Lista de Bandeiras</h1>
    <a href="{{ route('flags.create') }}" class="btn btn-primary mb-3">Criar Nova Bandeira</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Grupo Econômico</th>
                <th>Data de Criação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($flags as $flag)
                <tr>
                    <td>{{ $flag->id }}</td>
                    <td>{{ $flag->name }}</td>
                    <td>{{ $flag->economicGroup->name }}</td>
                    <td>{{ $flag->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('flags.edit', $flag) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('flags.destroy', $flag) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhuma bandeira encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
