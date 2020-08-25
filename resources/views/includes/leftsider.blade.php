<nav class="pcoded-navbar">
    <!-- SIDEBAR TOGGLE -->
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <!-- SIDEBAR MENU -->
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header" style="background: url('{{ asset('assets/images/user-bg.png') }}')">
                <img class="img-80 img-radius" src="{{ (@$auth->avatar) ? storage_path('public/peternakan/' . $auth->avatar) : asset('assets/images/avatar-0.png') }}"
                    alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">{{ (@$auth->username) ? $auth->username : 'Guest' }}</span>
                </div>
            </div>
        </div>
        <div class="pcoded-navigation-label">Navigasi</div>
        <ul class="pcoded-item pcoded-left-item">
            <li {{ @$activeMenu == 'beranda' ? 'class=active' : '' }}>
                <a href="{{ route('beranda') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>N</b></span>
                    <span class="pcoded-mtext">Beranda</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
