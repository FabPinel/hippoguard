<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <link rel="icon" href="https://image.noelshack.com/fichiers/2024/06/7/1707663571-logo-eco-service2.png" />
    <title>@yield('pageTitle')</title> 
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="antialiased bg-slate-100">
    @include('partials.navbar-admin')
    @include('partials.errors')
    <div class="content sm:px-4 md:px-4 lg:px-6 xl-px:10 2xl:px-14">
        @yield('admin-content')
    </div>
</body>

</html>
