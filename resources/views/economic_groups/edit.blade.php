@extends('layouts.main_layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-white mb-4">Editar Grupo Econômico</h2>
    <div class="card bg-dark text-white p-4">
        <form action="{{ route('economic-groups.update', $economicGroup) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $economicGroup->name) }}" required>
                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2">Atualizar</button>
                <a href="{{ route('economic-groups.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>
@endsection
