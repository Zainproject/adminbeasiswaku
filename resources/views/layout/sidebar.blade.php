<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('index') }}">
            <span class="align-middle">Admin Beasiswaku</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">Pages</li>

            <li class="sidebar-item {{ Request::is('index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('index') }}">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            @if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'admin1'))
                <li class="sidebar-header">Master Data</li>

                @if (Auth::user()->role === 'admin')
                    <li class="sidebar-item {{ Request::is('pendaftar*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ url('pendaftar') }}">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Data Pendaftar</span>
                        </a>
                    </li>
                @endif

                <li class="sidebar-item {{ Request::is('beasiswa*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ url('beasiswa') }}">
                        <i class="align-middle" data-feather="database"></i>
                        <span class="align-middle">Data Beasiswa</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('penyediabeasiswa*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ url('penyediabeasiswa') }}">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">Penyedia Beasiswa</span>
                    </a>
                </li>
            @endif

            @if (Auth::check() && (Auth::user()->role === 'user' || Auth::user()->role === 'admin'))
                <li class="sidebar-header">Pengajuan</li>
                <li class="sidebar-item {{ Request::is('proses*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ url('proses') }}">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">Ajukan Beasiswa</span>
                    </a>
                </li>
            @endif

            @if (Auth::check() && Auth::user()->role === 'admin')
                <li class="sidebar-header">Export Data</li>
                <li class="sidebar-item {{ Request::is('export/pendaftar') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('export.pendaftar') }}">
                        <i class="align-middle" data-feather="download"></i>
                        <span class="align-middle">Export Pendaftar</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('export/beasiswa') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('export.beasiswa') }}">
                        <i class="align-middle" data-feather="download"></i>
                        <span class="align-middle">Export Beasiswa</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('export/penyediabeasiswa') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('export.penyediabeasiswa') }}">
                        <i class="align-middle" data-feather="download"></i>
                        <span class="align-middle">Export Penyedia</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('export/proses') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('export.proses') }}">
                        <i class="align-middle" data-feather="download"></i>
                        <span class="align-middle">Export Proses</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
\
