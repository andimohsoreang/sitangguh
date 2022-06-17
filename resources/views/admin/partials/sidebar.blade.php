<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src={{ asset('be/assets/images/logo.svg') }} alt="" srcset="">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>
                <li class="sidebar-item active">
                    <a href="index.html" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="{{ route('notifikasi.index') }}" class='sidebar-link'>
                        <i data-feather="file-plus" width="20"></i>
                        <span>Notifikasi</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="{{ route('verifikasi.index') }}" class='sidebar-link'>
                        <i data-feather="file-plus" width="20"></i>
                        <span>Verifikasi Bencana</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="{{ route('riwayat.index') }}" class='sidebar-link'>
                        <i data-feather="file-plus" width="20"></i>
                        <span>Riwayat Penanganan</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>