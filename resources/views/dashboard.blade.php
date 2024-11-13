@extends('layouts.main_layout')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 class="text-white fw-bold">Management System</h1>
        <p class="text-secondary">Select one of the sections below to get started:</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card bg-dark text-white shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-graph-up-arrow display-4 mb-3"></i>
                    <h5 class="card-title">Economic Group</h5>
                    <a href="{{ route('economic-groups.index') }}" class="btn btn-outline-light mt-2">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-flag-fill display-4 mb-3"></i>
                    <h5 class="card-title">Flag</h5>
                    <a href="{{ route('flags.index') }}" class="btn btn-outline-light mt-2">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-building display-4 mb-3"></i>
                    <h5 class="card-title">Unit</h5>
                    <a href="{{ route('units.index') }}" class="btn btn-outline-light mt-2">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-people-fill display-4 mb-3"></i>
                    <h5 class="card-title">Collaborators</h5>
                    <a href="{{ route('collaborators.index') }}" class="btn btn-outline-light mt-2">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-white shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-file-earmark-text-fill display-4 mb-3"></i>
                    <h5 class="card-title">Audit Logs</h5>
                    <a href="{{ route('audits.index') }}" class="btn btn-outline-light mt-2">View Logs</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-file-earmark-spreadsheet-fill display-4 mb-3"></i>
                    <h5 class="card-title">Employee Report</h5>
                    <a href="{{ route('collaborators.report') }}" class="btn btn-outline-light mt-2">Generate Report</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
