<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-200 flex items-center justify-center">

    <div class="w-full sm:max-w-md px-8 py-8 bg-white shadow-2xl rounded-2xl border border-gray-100">
        {{ $slot }}
    </div>

</body>
</html>