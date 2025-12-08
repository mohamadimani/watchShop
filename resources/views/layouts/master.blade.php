<!DOCTYPE html>
<html dir="rtl" lang="en">
@include('layouts.head')
<body>
    @include('layouts.header')

    @yield('main')

    @include('layouts.footer')
</body>
@include('layouts.scripts')
</html>
