<aside id="layout-menu" class="layout-menu menu-vertical  menu bg-menu-theme sidebar-lang-style">
    @if (lang() == 'en')
        <style>
            .sidebar-lang-style,
            .sidebar-lang-style * {
                direction: ltr !important;
                text-align: left !important;
            }
        </style>
    @endif
    <div class="app-brand demo mt-3">
        <a href="index.html" class="app-brand-link w-100">
            <span class="app-brand-logo demo ">
                <span class="app-brand-text demo menu-text fw-bold ms-2">{{ __('public.site_name') }}</span>
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto ">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-divider mt-0"></div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">

        <li class="menu-header small text-uppercase"><span class="menu-header-text"></span></li>
        <li class="menu-item {{ ActiveMenu('admin.home') }}">
            <a href="{{ route('admin.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-home-circle "></i>
                <div>{{ __('sidebar.dashboard') }}</div>
            </a>
        </li>
        <li class="menu-item {{ ActiveMenu('admin.menus') }}">
            <a href="{{ route('admin.menus') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-food-menu"></i>
                <div>{{ __('sidebar.menus') }}</div>
            </a>
        </li>
        <li class="menu-item {{ ActiveMenu('admin.contact-us') }}">
            <a href="{{ route('admin.contact-us') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-contact"></i>
                <div>{{ __('sidebar.contact-us') }}</div>
            </a>
        </li>
        <li class="menu-item {{ ActiveMenu('admin.services') }}">
            <a href="{{ route('admin.services') }}" class="menu-link">
                <i class="menu-icon bx bxs-customize"></i>
                <div>{{ __('sidebar.services') }}</div>
            </a>
        </li>

        {{-- <li class="menu-item {{ ActiveMenu('admin.portfolio.feedback') }}">
            <a href="{{ route('admin.portfolio.feedback') }}" class="menu-link">
                <i class="menu-icon bx bxs-message"></i>
                <div>{{ __('sidebar.portfolio_feedback') }}</div>
            </a>
        </li> --}}
        <li class="menu-item {{ ActiveMenu('admin.about') }}">
            <a href="{{ route('admin.about') }}" class="menu-link">
                <i class="menu-icon bx bxs-id-card"></i>
                <div>{{ __('sidebar.about') }}</div>
            </a>
        </li>
        <li class="menu-item {{ ActiveMenu('admin.social') }}">
            <a href="{{ route('admin.social') }}" class="menu-link">
                <i class="menu-icon bx bxl-instagram-alt"></i>
                <div>{{ __('sidebar.social') }}</div>
            </a>
        </li>
    </ul>
</aside>
