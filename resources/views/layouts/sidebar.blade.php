<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/favicon/mosquee.png') }}" alt="Logo-ZIS" height="40px">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-3"> ZIS</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Keuangan ZIS</span>
        </li>
        <li class="menu-item {{ request()->is('zakat*') ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-book-alt"></i>
                <div data-i18n="">Data Keuangan ZIS</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('zakat') ? 'active' : '' }}">
                    <a href="{{ route('zakat') }}" class="menu-link">
                        <div data-i18n="Data Zakat">Data Zakat</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('infaq') ? 'active' : '' }}">
                    <a href="" class="menu-link">
                        <div data-i18n="Data Infaq">Data Infaq</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('sedekah') ? 'active' : '' }}">
                    <a href="" class="menu-link">
                        <div data-i18n="Data Sedekah">Data Sedekah</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- SECTION LAPORAN  --}}

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Laporan Keuangan ZIS</span>
        </li>
        <li class="menu-item {{ request()->is('laporan*') ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="">Laporan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('report-zakat') ? 'active' : '' }}">
                    <a href="" class="menu-link">
                        <div data-i18n="Laporan Zakat">Laporan Zakat</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('report-infaq') ? 'active' : '' }}">
                    <a href="" class="menu-link">
                        <div data-i18n="Laporan Infaq">Laporan Infaq</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('report-sedekah') ? 'active' : '' }}">
                    <a href="" class="menu-link">
                        <div data-i18n="Laporan Sedekah">Laporan Sedekah</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- SECTION SISTEM PENDUKUNG KEPUTUSAN  --}}

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Sistem Pendukung Keputusan</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-data"></i>
                <div data-i18n="">SPK</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Data Penerima">Data Penerima</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="SPK">SPK</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
