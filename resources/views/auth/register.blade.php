@extends('layouts.main_layout')

@section('content')
<div class="container mt-5 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6 col-lg-5">
        <h2 class="text-center mb-4">Registrar</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome Completo" required>
                <label for="name">Nome</label>
                @if ($errors->has('name'))
                    <div class="text-danger mt-1">{{ $errors->first('name') }}</div>
                @endif
            </div>
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
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirme a Senha" required>
                <label for="password_confirmation">Confirme a Senha</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Registrar</button>
        </form>
    </div>
</div>
@endsection
