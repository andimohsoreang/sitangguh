<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <h3 class="m-0">SITANGGUH</h3>
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
                <li class="sidebar-item 
                {{ 
                    request()->routeIs('admin.notifikasi') || 
                    request()->routeIs('petugas.notifikasi') || 
                    request()->routeIs('user.notifikasi') 
                    ? 'active' : ''
                }}">
                    @role('admin')
                        <a href="{{ route('admin.notifikasi') }}" class='sidebar-link'>
                    @endrole
                    @role('petugas')
                        <a href="{{ route('petugas.notifikasi') }}" class='sidebar-link'>
                    @endrole
                    @role('user')
                        <a href="{{ route('user.notifikasi') }}" class='sidebar-link'>
                    @endrole
                        <i data-feather="file-plus" width="20"></i>
                        <span>Notifikasi</span>
                    </a>
                </li>
                @role('petugas')
                <li class="sidebar-item {{ request()->routeIs('petugas.verifikasi') ? 'active' : '' }}">
                    <a href="{{ route('petugas.verifikasi') }}" class='sidebar-link'>
                        <i data-feather="file-plus" width="20"></i>
                        <span>Verifikasi Bencana</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('petugas.riwayat') ? 'active' : '' }}">
                    <a href="{{ route('petugas.riwayat') }}" class='sidebar-link'>
                        <i data-feather="file-plus" width="20"></i>
                        <span>Riwayat Penanganan</span>
                    </a>
                </li>
                @endrole
                @role('admin')
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