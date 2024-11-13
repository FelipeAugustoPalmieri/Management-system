@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
            @if ($errors->has('email'))
            <div class="text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password" required>
            @if ($errors->has('password'))
            <div class="text-danger">{{ $errors->first('password') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
@endsection
