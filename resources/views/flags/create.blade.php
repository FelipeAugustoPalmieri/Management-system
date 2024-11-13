@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h1>Criar Nova Bandeira</h1>
    <form action="{{ route('flags.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @if ($errors->has('name'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="economic_group_id" class="form-label">Grupo Econômico</label>
            <select class="form-control" id="economic_group_id" name="economic_group_id" required>
                @foreach($economicGroups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('economic_group_id'))
                <div class="text-danger">{{ $errors->first('economic_group_id') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('flags.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
