<div class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="index.html">
            <img src="{{ asset('admin-assets/sash/assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{ asset('admin-assets/sash/assets/images/brand/logo-1.png') }}" class="header-brand-img toggle-logo" alt="logo">
            <img src="{{ asset('admin-assets/sash/assets/images/brand/logo-2.png') }}" class="header-brand-img light-logo" alt="logo">
            <img src="{{ asset('admin-assets/sash/assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1" alt="logo">
        </a>
        <!-- LOGO -->
    </div>
    <div class="main-sidemenu">
        <div class="slide-left disabled" id="slide-left">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
            </svg>
        </div>
        <ul class="side-menu">
            <li class="sub-category">
                <h3>Main</h3>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="index.html">
                    <i class="side-menu__icon fe fe-home"></i>
                    <span class="side-menu__label">Dashboard</span>
                </a>
            </li>
            <li class="sub-category">
                <h3>{{ Auth::user()->roles()->pluck('name')->first() }}</h2>
            </li>
            <li>
                <a class="side-menu__item" href="{{ route('offers.index') }}">
                    <span class="side-menu__label">Offres</span>
                    <i class="angle fe fe-chevron-right"></i>
                </a>
            </li>
            <li>
                <a class="side-menu__item" href="{{ route('owners.index') }}">
                    <span class="side-menu__label">Proprietaire</span>
                    <i class="angle fe fe-chevron-right"></i>
                </a>
            </li>
            <li>
                <a class="side-menu__item" href="{{ route('licenses.index') }}">
                    <span class="side-menu__label">Licenses</span>
                    <i class="angle fe fe-chevron-right"></i>
                </a>
            </li>
            <li>
                <a class="side-menu__item" href="{{ route('organizations.index') }}">
                    <span class="side-menu__label">Organisations</span>
                    <i class="angle fe fe-chevron-right"></i>
                </a>
            </li>
            <li>
                <a class="side-menu__item" href="{{ route('managers.index') }}">
                    <span class="side-menu__label">Managers</span>
                    <i class="angle fe fe-chevron-right"></i>
                </a>
            </li>
            <li>
                <a class="side-menu__item" href="{{ route('clients.index') }}">
                    <span class="side-menu__label">Clients</span>
                    <i class="angle fe fe-chevron-right"></i>
                </a>
            </li>
            <li>
                <a class="side-menu__item" href="{{ route('sessions.index') }}">
                    <span class="side-menu__label">Sessions</span>
                    <i class="angle fe fe-chevron-right"></i>
                </a>
            </li>
            <li>
                <a class="side-menu__item" href="{{ route('countries.index') }}">
                    <span class="side-menu__label">Pays</span>
                    <i class="angle fe fe-chevron-right"></i>
                </a>
            </li>
            <li>
                <a class="side-menu__item" href="{{ route('provinces.index') }}">
                    <span class="side-menu__label">Provinces</span>
                    <i class="angle fe fe-chevron-right"></i>
                </a>
            </li>
            <li>
                <a class="side-menu__item" href="{{ route('cities.index') }}">
                    <span class="side-menu__label">Villes</span>
                    <i class="angle fe fe-chevron-right"></i>
                </a>
            </li>
            <li>
                <a class="side-menu__item" href="{{ route('townships.index') }}">
                    <span class="side-menu__label">Communes</span>
                    <i class="angle fe fe-chevron-right"></i>
                </a>
            </li>
            <li>
                <a class="side-menu__item" href="{{ route('streets.index') }}">
                    <span class="side-menu__label">Avenues</span>
                    <i class="angle fe fe-chevron-right"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
