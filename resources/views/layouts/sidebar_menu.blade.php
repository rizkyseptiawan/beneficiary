<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}">Beneficiary</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">{{ url('/') }}</a>
    </div>
    <ul class="sidebar-menu">
        @if(auth()->user()->hasRole('admin'))
        <li class="menu-header">Dashboard Admin</li>
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('beneficiary.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Daftar Biodata Penerima</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('periode.index') }}" class="nav-link"><i class="fas fa-calendar-alt"></i><span>Periode Bantuan</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('criteria.index') }}" class="nav-link"><i class="fas fa-th-list"></i><span>Kriteria</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-list-ol"></i><span>Sub Kriteria</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-square-root-alt"></i><span>Dukung Keputusan</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-history"></i><span>Riwayat
                    Bantuan</span></a>
        </li>
        @endif
        @if(auth()->user()->hasRole('beneficiary'))
        <li class="menu-header">Dashboard Penerima</li>
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-user"></i><span>Biodata
                    Penerima</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-comments-dollar"></i><span>Pengajuan
                    Bantuan</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-history"></i><span>Riwayat
                    Bantuan</span></a>
        </li>
        @endif
    </ul>
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Pusat Bantuan
        </a>
    </div>
</aside>