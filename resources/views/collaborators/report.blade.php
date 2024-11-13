@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h1>Relatório de Colaboradores</h1>

    <form action="{{ route('collaborators.report') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ request('name') }}">
            </div>
            <div class="col-md-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ request('cpf') }}">
            </div>
            <div class="col-md-3">
                <label for="unit_id" class="form-label">Unidade</label>
                <select class="form-control" id="unit_id" name="unit_id">
                    <option value="">Todas</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}" {{ request('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->fantasy_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <form action="{{ route('collaborators.export') }}" method="GET">
        <input type="hidden" name="name" value="{{ request('name') }}">
        <input type="hidden" name="cpf" value="{{ request('cpf') }}">
        <input type="hidden" name="unit_id" value="{{ request('unit_id') }}">
        <button type="submit" class="btn btn-success mb-3">Gerar Relatório</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Unidade</th>
                <th>Data de Criação</th>
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
                </tr>
            @empty
                <tr>
                    <td colspan="6">Nenhum colaborador encontrado com os filtros aplicados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
