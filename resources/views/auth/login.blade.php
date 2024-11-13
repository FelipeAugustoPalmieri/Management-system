@extends('layouts.main_layout')

@section('content')
<div class="container mt-5 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6 col-lg-4">
        <h2 class="text-center mb-4">Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                <label for="email">Email</label>
                @if ($errors->has('email'))
                    <div class="text-danger mt-1">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                <label for="password">Senha</label>
                @if ($errors->has('password'))
                    <div class="text-danger mt-1">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Entrar</button>
        </form>
        <div class="text-center">
            <p>Não tem uma conta? <a href="{{ route('register') }}" class="btn btn-outline-secondary">Registrar</a></p>
        </div>
    </div>
</div>
@endsection
