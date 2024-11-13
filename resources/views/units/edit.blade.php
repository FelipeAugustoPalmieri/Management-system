@extends('layouts.main_layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-white mb-4">Editar Unidade</h2>
    <div class="card bg-dark text-white p-4">
        <form action="{{ route('units.update', $unit) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="fantasy_name" class="form-label">Nome Fantasia</label>
                <input type="text" class="form-control" id="fantasy_name" name="fantasy_name" value="{{ old('fantasy_name', $unit->fantasy_name) }}" required>
                @error('fantasy_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="corporate_name" class="form-label">Razão Social</label>
                <input type="text" class="form-control" id="corporate_name" name="corporate_name" value="{{ old('corporate_name', $unit->corporate_name) }}" required>
                @error('corporate_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cnpj" class="form-label">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ old('cnpj', $unit->cnpj) }}" required>
                @error('cnpj')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="flag_id" class="form-label">Bandeira</label>
                <select class="form-control" id="flag_id" name="flag_id" required>
                    @foreach($flags as $flag)
                        <option value="{{ $flag->id }}" {{ $unit->flag_id == $flag->id ? 'selected' : '' }}>{{ $flag->name }}</option>
                    @endforeach
                </select>
                @error('flag_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2">Atualizar</button>
                <a href="{{ route('units.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>
@endsection
