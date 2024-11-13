@extends('layouts.main_layout')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white">Lista de Bandeiras</h2>
        <a href="{{ route('flags.create') }}" class="btn btn-success">Criar Nova Bandeira</a>
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
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('flags.edit', $flag) }}" class="btn btn-sm btn-warning me-2">Editar</a>
                            <form action="{{ route('flags.destroy', $flag) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar?')" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-muted">Nenhuma bandeira encontrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
