<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">Management System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('economic-groups.index') }}">Grupos Econômicos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('flags.index') }}">Bandeiras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('units.index') }}">Unidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('collaborators.index') }}">Colaboradores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('audits.index') }}">Logs de Auditoria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('collaborators.report') }}">Relatório</a>
                </li>
                @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
