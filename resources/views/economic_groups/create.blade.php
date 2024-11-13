@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h1>Criar Novo Grupo Econômico</h1>
    <form action="{{ route('economic-groups.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @if ($errors->has('name'))
            <div class="text-danger">{{ $errors->first('name') }}</div>
        @endif
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="/economic-groups" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection

