<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/index.js'])
</head>
<body class="max-h-screen">
    <!-- header Content -->
    <header class="fixed h-[80px] w-full bg-gray-200 flex items-center pl-4">
        <div id="header" class="flex justify-between w-full pr-8">
            <h2>販売サイトに戻る</h2>

        </div>
    </header>
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</body>
</html>
