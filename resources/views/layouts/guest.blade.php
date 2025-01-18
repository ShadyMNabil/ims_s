<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport"content="width=device-width, initial-scale=1">

    <title>
        {{ config('app.name') }}
        @hasSection('title')
            | @yield('title')
        @endif
    </title>

    <!-- Fonts -->
    <link rel="preconnect"href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/scss/admin.scss', 'resources/js/app.js'])
</head>

<body>
    @yield('content')
</body>

</html>
