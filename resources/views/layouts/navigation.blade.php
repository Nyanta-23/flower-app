<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
            <a class="app-logo" href="{{ route('dashboard') }}"><img class="logo-icon me-2"
                    src="{{ asset('theme/images/app-logo.svg') }}" alt="logo" /><span
                    class="logo-text"><b>Plant</b>Scan</span></a>
        </div>

        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <span class="nav-icon my-1">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle {{ Request::is(['plant*', 'category*']) ? 'active' : '' }}"
                        href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false"
                        aria-controls="submenu-1">
                        <span class="nav-icon my-1">
                            <i class="fa fa-seedling"></i>
                        </span>
                        <span class="nav-link-text">Tanaman</span>
                        <span class="submenu-arrow">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </span>
                    </a>
                    <div id="submenu-1"
                        class="{{ Request::is(['plant*', 'category*']) ? '' : 'collapse' }} submenu submenu-1"
                        data-bs-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item">
                                <a class="submenu-link {{ Request::is('plant*') ? 'active' : '' }}"
                                    href="{{ route('plant') }}">Daftar Tanaman</a>
                            </li>
                            <li class="submenu-item">
                                <a class="submenu-link {{ Request::is('category*') ? 'active' : '' }}"
                                    href="{{ route('category') }}">Kategori</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('scan-history*') ? 'active' : '' }}"
                        href="{{ route('scan-history') }}">
                        <span class="nav-icon my-1">
                            <i class="fa fa-history"></i>
                        </span>
                        <span class="nav-link-text">Riwayat Scan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('user*') ? 'active' : '' }}" href="{{ route('user') }}">
                        <span class="nav-icon my-1">
                            <i class="fa fa-users"></i>
                        </span>
                        <span class="nav-link-text">Daftar Admin</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
