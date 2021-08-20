<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Noviyanto Rahmadi <novay@btekno.id">
    <meta name="keywords" content="Website Resmi Borneo Teknomedia, Cv">
    <meta name="description" content="@yield('description')">
    
    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@404vay">
    
    {{-- Facebook --}}
    <meta property="og:logo" content="{{ asset('assets/images/favicon.png') }}">
    <meta property="og:site_name" content="Btekno">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('image')">
    <meta property="og:url" content="@yield('url')">
    <meta property="og:type" content="article">
    
    <title>@yield('title')</title>

    {{-- Apple Devices --}}
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#92c83b">
    <link href="{{ asset('assets/images/favicon.png') }}" rel="icon" type="image/png">

    {{-- Styles --}}
    {!! Minify::stylesheet([
        '/assets/css/icons.css', 
        '/assets/css/uikit.css', 
        '/assets/css/style.css', 
        '/assets/css/tailwind.css'
    ])->withFullUrl() !!}

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @if (Cookie::get('color_mode') === 'dark')
        <link href="{{ mix('css/dark-mode.css') }}" rel="stylesheet">
    @endif
    @if (Cookie::get('color_mode') === 'auto')
        <link href="{{ mix('css/auto-mode.css') }}" rel="stylesheet">
    @endif

    <livewire:styles />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head> 
<body>
    <div id="app">
        @include('layouts.partials.sidenav')
        <div id="wrapper" class="@yield('wrapper-class')">
            
            @include('layouts.partials.header')
            @yield('sidebar')

            @yield('content')
        </div>
    </div>
 
     <script>
        (function (window, document, undefined) {
            'use strict';
            if (!('localStorage' in window)) return;
            var nightMode = localStorage.getItem('gmtNightMode');
            if (nightMode) {
                document.documentElement.className += ' night-mode';
            }
        })(window, document);
        (function (window, document, undefined) {
            'use strict';
            if (!('localStorage' in window)) return;
            var nightMode = document.querySelector('#night-mode');
            if (!nightMode) return;
            nightMode.addEventListener('click', function (event) {
                event.preventDefault();
                document.documentElement.classList.toggle('dark');
                if (document.documentElement.classList.contains('dark')) {
                    localStorage.setItem('gmtNightMode', true);
                    return;
                }
                localStorage.removeItem('gmtNightMode');
            }, false);
        })(window, document);
    </script>
</body>

{!! Minify::javascript([
    '/assets/js/jquery-3.3.1.min.js', 
    '/assets/js/tippy.all.min.js', 
    '/assets/js/uikit.js', 
    '/assets/js/simplebar.js', 
    '/assets/js/custom.js', 
    '/assets/js/bootstrap-select.min.js'
])->withFullUrl() !!}
<script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.3/ionicons/ionicons.esm.js"></script>
<script nomodule="" src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.3/ionicons/ionicons.js"></script>

<livewire:scripts />

<script src="{{ mix('js/bootstrap.js') }}" defer></script>
<script src="{{ mix('js/app.js') }}" defer></script>

@yield('js')
</html>