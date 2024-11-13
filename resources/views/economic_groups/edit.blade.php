@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h1>Editar Grupo Econômico</h1>
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
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('economic-groups.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
