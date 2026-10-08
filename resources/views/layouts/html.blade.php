<!DOCTYPE html>
<html lang="{{ env('APP_LOCALE') }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        @yield('title', $title ?? env('APP_NAME'))
    </title>
    <meta name="description" content="@yield('description', $description ?? env('APP_NAME'))">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>

<body>
    @stack('body')
</body>

</html>
