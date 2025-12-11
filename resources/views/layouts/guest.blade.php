<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>HitNRunStudios</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
        .text-true-red {
            color: #FF0000;
        }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex flex-col min-h-screen bg-black">
        <div class="flex-grow flex items-center justify-center pt-20 pb-20">

            <div class="bg-neutral-900 rounded-lg p-8 w-full max-w-md border border-neutral-800">
                {{ $slot }}
            </div>
        </div>
    </body>
    <footer class="text-center text-white bg-neutral-900 border-t border-neutral-700">
        <div class="container mx-auto px-4 py-10">
            <p>&copy; 2025 Hit&RunStudios. All rights reserved.</p>
            <div class="flex justify-center space-x-6 mt-4">
                <a href="#" class="text-white hover:text-red-600 transition">Privacy Policy</a>
                <a href="#" class="text-white hover:text-red-600 transition">Terms of Service</a>
            </div>
        </div>
    </footer>
</html>
