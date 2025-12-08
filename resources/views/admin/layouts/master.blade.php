<html lang="fa" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl">
@include('admin.layouts.head');
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('admin.layouts.sidebar')
            <div class="layout-page">
                @include('admin.layouts.navbar')
                <div class="content-wrapper">
                    @yield('content')
                    @include('admin.layouts.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>
</body>
@include('admin.layouts.scripts')
</html>