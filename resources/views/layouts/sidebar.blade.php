<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/actores/logo-dark-sm.png') }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/actores/logo-dark.png') }}" alt="" height="28">
            </span>
        </a>

        <a href="index" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="30">
            </span>
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-light-sm.png') }}" alt="" height="26">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
        <i class="bx bx-menu align-middle"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title" data-key="t-pages">Plataforma</li>

                <li>
                    <a href="/dashboard">
                        <i class='bx bx-home icon nav-icon'></i>
                        <span class="menu-item" data-key="t-authentication">Inicio</span>
                        {{-- <span class="badge rounded-pill bg-info">8</span> --}}
                    </a>
                </li>
                <li class="menu-title" data-key="t-pages">Pages</li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="bx bx-user-pin icon nav-icon"></i>
                        <span class="menu-item" data-key="t-authentication">Gestión de socios</span>
                        {{-- <span class="badge rounded-pill bg-info">8</span> --}}
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('/menu/socios/repertorio') }}" data-key="t-login">Socios</a></li>
                        <li><a href="{{ url('/producciones') }}" data-key="t-register">Producciones</a></li>
                    </ul>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-file icon nav-icon"></i>
                        <span class="menu-item" data-key="t-utility">Distribución</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter" data-key="t-starter-page">Ítem</a></li>
                        <li><a href="pages-maintenance" data-key="t-maintenance">Ítem</a></li>
                        <li><a href="pages-comingsoon" data-key="t-coming-soon">Ítem</a></li>
                        <li><a href="pages-404" data-key="t-error-404">Ítem</a></li>
                        <li><a href="pages-500" data-key="t-error-500">Ítem</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
