<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href=" {{ route('admin.index') }} ">Admin - PsFilm</a>
    <!-- Sidebar Toggle-->s
    <button class="btn btn-link  order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <a class="navbar-brand mb-2" href=" {{ route('home.index') }} "><i class="fa-solid fa-house"></i></a>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Tìm kiếm..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->

    {{-- <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdow" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdow">
                <li><a class="dropdown-item" href="#!">Thông tin tài khoản</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Đăng xuất</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                    @csrf
                </form>
            </ul>

        </li>
    </ul> --}}

    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

        <a class="a-logout" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-right-from-bracket"></i>
            Đăng xuất
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
            @csrf
        </form>
    </ul>
</nav>
