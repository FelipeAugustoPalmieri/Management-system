@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h1>Criar Novo Colaborador</h1>
    <form action="{{ route('collaborators.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" required>
            @error('cpf')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="unit_id" class="form-label">Unidade</label>
            <select class="form-control" id="unit_id" name="unit_id" required>
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->fantasy_name }}</option>
                @endforeach
            </select>
            @error('unit_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('collaborators.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
