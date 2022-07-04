<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('be/assets/images/bpbdlogo.png') }}">
                <h3 class="m-0">SITANGGUH</h3>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>
                <li class="sidebar-item
                {{ 
                    request()->routeIs('admin.index') || 
                    request()->routeIs('petugas.index') || 
                    request()->routeIs('user.index') 
                    ? 'active' : ''
                }}
                ">
                    @role('admin')
                        <a href="{{ route('admin.index') }}" class='sidebar-link'>
                    @endrole
                    @role('petugas')
                        <a href="{{ route('petugas.index') }}" class='sidebar-link'>
                    @endrole
                    @role('user')
                        <a href="{{ route('user.index') }}" class='sidebar-link'>
                    @endrole
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @role('user')
                <li class="sidebar-item {{ request()->routeIs('user.laporanbencana') ? 'active' : '' }}">
                    <a href="{{ route('user.laporanbencana') }}" class='sidebar-link'>
                        <i data-feather="flag" width="20"></i>
                        <span>Laporan Bencana</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('user.laporanterkirim') ? 'active' : '' }}">
                    <a href="{{ route('user.laporanterkirim') }}" class='sidebar-link'>
                        <i data-feather="check-square" width="20"></i>
                        <span>Laporan Terkirim</span>
                    </a>
                </li>
                @endrole
                @role('petugas')
                <li class="sidebar-item {{ request()->routeIs('petugas.notifikasi') ? 'active' : '' }}">
                    <a href="{{ route('petugas.notifikasi') }}" class='sidebar-link'>
                        <i data-feather="bell" width="20"></i>
                        <span>Notifikasi</span>
                        @if ($lpbencana != 0)
                            <span class="badge bg-danger badge-pill badge-round text-white">{{ $lpbencana }}</span>
                        @endif
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('petugas.verifikasi') ? 'active' : '' }}">
                    <a href="{{ route('petugas.verifikasi') }}" class='sidebar-link'>
                        <i data-feather="check-square" width="20"></i>
                        <span>Verifikasi Bencana</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('petugas.riwayat') ? 'active' : '' }}">
                    <a href="{{ route('petugas.riwayat') }}" class='sidebar-link'>
                        <i data-feather="file-text" width="20"></i>
                        <span>Riwayat Penanganan</span>
                    </a>
                </li>
                @endrole
                @role('admin')
                <li class="sidebar-item has-sub 
                    @if (
                        request()->routeIs('laporan.tunggu') || 
                        request()->routeIs('laporan.tolak') || 
                        request()->routeIs('laporan.proses') || 
                        request()->routeIs('laporan.selesai')
                    )
                        active 
                    @endif
                ">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="flag" width="20"></i> 
                        <span>Laporan Bencana</span>
                    </a>
                    <ul class="submenu
                    @if (
                        request()->routeIs('laporan.tunggu') || 
                        request()->routeIs('laporan.tolak') || 
                        request()->routeIs('laporan.proses') || 
                        request()->routeIs('laporan.selesai')
                    )
                        active 
                    @endif
                    ">
                        <li>
                            <a href="{{ route('laporan.tunggu') }}">Tunggu</a>
                        </li>
                        <li>
                            <a href="{{ route('laporan.tolak') }}">Ditolak</a>
                        </li>
                        <li>
                            <a href="{{ route('laporan.proses') }}">Proses</a>
                        </li>
                        <li>
                            <a href="{{ route('laporan.selesai') }}">Selesai</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ request()->routeIs('admin.rekap') ? 'active' : '' }}">
                    <a href="{{ route('admin.rekap') }}" class='sidebar-link'>
                        <i data-feather="file-plus" width="20"></i>
                        <span>Rekap Laporan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('admin.petugas') ? 'active' : '' }}">
                    <a href="{{ route('admin.petugas') }}" class='sidebar-link'>
                        <i data-feather="file-plus" width="20"></i>
                        <span>Daftar Petugas</span>
                    </a>
                </li>
                @endrole
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>