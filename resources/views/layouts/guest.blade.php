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
        <style>
        .text-gray-700 {
        --tw-text-opacity: 1;
        color: rgb(255 255 255);
}

.justify-end {
    justify-content: center;
    gap: 9REM;
    color: #fff;
}

.underline {
    text-decoration-line: underline;
    color: white;
}
.text-gray-600 {
    --tw-text-opacity: 1;
    color: rgb(255 255 255);
}
    </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cover bg-center"
            style="background-image: url('{{ asset('image/chibi.gif') }}'); background-repeat: no-repeat; background-size: cover;">
            <div>
                <a href="/">
                    <img src="{{ asset('image/cute.gif') }}" alt="Logo" class="w-20 h-20 mx-auto">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-lg  overflow-hidden sm:rounded-lg style="background: transparent;" style="background: rgba(183 52 52 / 30%);">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
