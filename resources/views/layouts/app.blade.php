<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    
    
    @include('partials.nav')
</head>
<body class="wrapper">
    <div id="app" class="d-flex flex-column h-screen justify-content-between">
        <main class="py-4 content">
            @yield('content')
        </main>
    </div>
    <footer class="py-3 shadow footer-bs stic bg-body-tertiary border-top border-black">
        {{config('app.name')}} | Tap terminal | Copyright @ {{date('Y')}}
    </footer>
</body>
</html>
