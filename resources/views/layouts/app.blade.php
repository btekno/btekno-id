<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <link href="{{ asset('assets/images/favicon.png') }}" rel="icon" type="image/png">
    
    {!! Minify::stylesheet([
        '/assets/css/icons.css', 
        '/assets/css/uikit.css', 
        '/assets/css/style.css', 
        '/assets/css/tailwind.css'
    ])->withFullUrl() !!}

    @yield('css')
    
</head> 
<body>
    @include('layouts.partials.sidenav')
    <div id="wrapper">
        
        @include('layouts.partials.header')
        @yield('sidebar')

        <div class="main_content">
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

    @yield('js')

</body>
</html>