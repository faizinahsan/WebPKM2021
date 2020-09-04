<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('csslinks')
</head>

<body>
    <div class="header-ok">
        <div class="nav-container">
            <!-- Start Navbar -->
            @include('layouts.topnav')
            @yield('navcontent')
            <!-- End Navbar -->
        </div>
    </div>

    {{-- Content Goes Here --}}
    @yield('content')
    {{-- End Of Content --}}

    @include('layouts.footer')
    
    @yield('jslinks')
</body>

</html>