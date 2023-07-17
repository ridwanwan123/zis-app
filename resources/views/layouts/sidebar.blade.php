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



        @if (auth()->user()->role->name === 'Admin')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Data Pengelola ZIS</span>
            </li>
            <li
                class="menu-item {{ request()->routeIs('adminZIS') || request()->routeIs('mosque') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-book-alt"></i>
                    <div data-i18n="">Data Pengelola</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('adminZIS') ? 'active' : '' }}">
                        <a href="{{ route('adminZIS') }}" class="menu-link">
                            <div data-i18n="Data AkunZIS">Akun Pengelola ZIS</div>
                        </a>
                    </li>
                </ul>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('mosque') ? 'active' : '' }}">
                        <a href="{{ route('mosque') }}" class="menu-link">
                            <div data-i18n="Data Masjid">Data Masjid</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if (auth()->user()->role->name === 'DKM')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Data Keuangan ZIS</span>
            </li>
            <li
                class="menu-item {{ request()->is('zakat*') || request()->routeIs('infaq') || request()->routeIs('sedekah') ? 'active open' : '' }}">
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
                        <a href="{{ route('infaq') }}" class="menu-link">
                            <div data-i18n="Data Infaq">Data Infaq</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('sedekah') ? 'active' : '' }}">
                        <a href="{{ route('sedekah') }}" class="menu-link">
                            <div data-i18n="Data Sedekah">Data Sedekah</div>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- SECTION SISTEM PENDUKUNG KEPUTUSAN  --}}

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Sistem Pendukung Keputusan</span>
            </li>
            <li
                class="menu-item {{ request()->routeIs('mustahik') || request()->routeIs('hasilSPK') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-data"></i>
                    <div data-i18n="">SPK</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('mustahik') ? 'active' : '' }}">
                        <a href="{{ route('mustahik') }}" class="menu-link">
                            <div data-i18n="Data Penerima">Data Mustahik</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('hasilSPK') ? 'active' : '' }}">
                        <a href="{{ route('hasilSPK') }}" class="menu-link">
                            <div data-i18n="SPK">Hasil Perhitungan</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('penyaluranDana') ? 'active' : '' }}">
                        <a href="{{ route('penyaluranDana') }}" class="menu-link">
                            <div data-i18n="Dana">Penyaluran Dana</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</aside>
