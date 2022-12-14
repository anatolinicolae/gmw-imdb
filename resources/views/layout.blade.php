<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars Movie Database</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('head')
</head>
<body>
    @yield('header')

    <main class="max-w-2xl mx-auto pt-10 pb-12 px-4 lg:pb-16">
        @yield('content')
    </main>

    @yield('footer')
</body>
</html>
