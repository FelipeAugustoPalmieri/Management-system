@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h1>Logs de Auditoria</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Ação</th>
                <th>Entidade</th>
                <th>Data e Hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach($audits as $audit)
                <tr>
                    <td>{{ $audit->id }}</td>
                    <td>{{ $audit->user ? $audit->user->name : 'Desconhecido' }}</td>
                    <td>{{ $audit->event }}</td>
                    <td>{{ $audit->auditable_type }} (ID: {{ $audit->auditable_id }})</td>
                    <td>{{ $audit->created_at->format('d/m/Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $audits->links() }}
</div>
@endsection
