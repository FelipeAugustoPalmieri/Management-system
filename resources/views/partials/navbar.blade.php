<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">Management System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('economic-groups.index') }}">Economic Group</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('flags.index') }}">Flags</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('units.index') }}">Units</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('collaborators.index') }}">collaborators</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('audits.index') }}">Audit Logs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('collaborators.report') }}">Report</a>
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
