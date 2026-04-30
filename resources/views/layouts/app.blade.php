<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen flex flex-col">
            {{-- 1. Navigation --}}
            @include('layouts.navigation')

            {{-- 2. Page Heading --}}
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            {{-- 3. Page Content --}}
            <main class="flex-grow">
                {{ $slot }}
            </main>

            {{-- 4. Footer --}}
            <footer class="bg-slate-800 text-white py-6 mt-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <div>
                        <img src="{{ asset('images/narsa_logo_2.jpg') }}" style="width: 100%;" class="h-10 bg-white p-1 rounded" alt="NARSA logo">
                    </div>
                    <div class="text-sm">
                        <strong>Contact Support:</strong> 0528891774 | support@narsa.gov.ma
                    </div>
                    <div class="text-sm">
                        © 2026 NARSA HR Management
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>