@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h1>Criar Nova Unidade</h1>
    <form action="{{ route('units.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="fantasy_name" class="form-label">Nome Fantasia</label>
            <input type="text" class="form-control" id="fantasy_name" name="fantasy_name" required>
            @error('fantasy_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="corporate_name" class="form-label">Razão Social</label>
            <input type="text" class="form-control" id="corporate_name" name="corporate_name" required>
            @error('corporate_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" required>
            @error('cnpj')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="flag_id" class="form-label">Bandeira</label>
            <select class="form-control" id="flag_id" name="flag_id" required>
                @foreach($flags as $flag)
                    <option value="{{ $flag->id }}">{{ $flag->name }}</option>
                @endforeach
            </select>
            @error('flag_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('units.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
