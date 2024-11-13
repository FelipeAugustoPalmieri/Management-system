@extends('layouts.main_layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-white mb-4">Logs de Auditoria</h2>

    <div class="table-responsive">
        <table class="table table-dark table-hover text-center">
            <thead class="table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Ação</th>
                    <th>Entidade</th>
                    <th>Data e Hora</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($audits as $audit)
                    <tr>
                        <td>{{ $audit->id }}</td>
                        <td>{{ $audit->user ? $audit->user->name : 'Unknown' }}</td>
                        <td class="text-capitalize">{{ $audit->event }}</td>
                        <td>{{ class_basename($audit->auditable_type) }} (ID: {{ $audit->auditable_id }})</td>
                        <td>{{ $audit->created_at->format('d/m/Y H:i:s') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-muted">Nenhum registro de auditoria encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $audits->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
