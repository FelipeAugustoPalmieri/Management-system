@extends('layouts.main_layout')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white">Lista de Unidades</h2>
        <a href="{{ route('units.create') }}" class="btn btn-success">Criar Nova Unidade</a>
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
                    <th>Nome Fantasia</th>
                    <th>Razão Social</th>
                    <th>CNPJ</th>
                    <th>Bandeira</th>
                    <th>Data de Criação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($units as $unit)
                    <tr>
                        <td>{{ $unit->id }}</td>
                        <td>{{ $unit->fantasy_name }}</td>
                        <td>{{ $unit->corporate_name }}</td>
                        <td>{{ $unit->cnpj }}</td>
                        <td>{{ $unit->flag->name }}</td>
                        <td>{{ $unit->created_at->format('d/m/Y') }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('units.edit', $unit) }}" class="btn btn-sm btn-warning me-2">Editar</a>
                            <form action="{{ route('units.destroy', $unit) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar?')" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-muted">Nenhuma unidade encontrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
