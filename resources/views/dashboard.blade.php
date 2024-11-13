@extends('layouts.main_layout')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 class="text-white fw-bold">Management System</h1>
        <p class="text-secondary">Selecione uma das seções abaixo para começar:</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card bg-dark text-white shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-graph-up-arrow display-4 mb-3"></i>
                    <h5 class="card-title">Grupos Econômicos</h5>
                    <a href="{{ route('economic-groups.index') }}" class="btn btn-outline-light mt-2">Gerenciar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-flag-fill display-4 mb-3"></i>
                    <h5 class="card-title">Bandeiras</h5>
                    <a href="{{ route('flags.index') }}" class="btn btn-outline-light mt-2">Gerenciar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-building display-4 mb-3"></i>
                    <h5 class="card-title">Unidades</h5>
                    <a href="{{ route('units.index') }}" class="btn btn-outline-light mt-2">Gerenciar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-people-fill display-4 mb-3"></i>
                    <h5 class="card-title">Colaboradores</h5>
                    <a href="{{ route('collaborators.index') }}" class="btn btn-outline-light mt-2">Gerenciar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-white shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-file-earmark-text-fill display-4 mb-3"></i>
                    <h5 class="card-title">Logs de Auditoria</h5>
                    <a href="{{ route('audits.index') }}" class="btn btn-outline-light mt-2">Ver Logs</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-file-earmark-spreadsheet-fill display-4 mb-3"></i>
                    <h5 class="card-title">Relatório de Colaboradores</h5>
                    <a href="{{ route('collaborators.report') }}" class="btn btn-outline-light mt-2">Gerar Relatório</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
