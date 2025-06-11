<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My little cats shop') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .bg-gradient-page {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 50%, #e5e7eb 100%);
        }

        @media (prefers-color-scheme: dark) {
            .bg-gradient-page {
                background: linear-gradient(135deg, #111827 0%, #1f2937 50%, #374151 100%);
            }
        }
    </style>
</head>

<body class="font-sans antialiased bg-gradient-page text-gray-900 dark:text-gray-100 transition-colors duration-200">
    <div class="min-h-screen flex flex-col">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 shadow-sm">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>