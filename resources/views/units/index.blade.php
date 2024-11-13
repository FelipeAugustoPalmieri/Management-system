@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h1>Lista de Unidades</h1>
    <a href="{{ route('units.create') }}" class="btn btn-primary mb-3">Criar Nova Unidade</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
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
                    <td>
                        <a href="{{ route('units.edit', $unit) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('units.destroy', $unit) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Nenhuma unidade encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
