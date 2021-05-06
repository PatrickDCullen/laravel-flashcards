<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Flashcards</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 mb-4">
                    <h1 class="text-6xl text-blue-700">Laravel Flashcards</h1>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg px-6 py-4">
                    <p class="mt-2 mb-4">Make flashcards. Quiz yourself.</p>

                    @if (Route::has('login'))
                        <div class="py-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700">
                                    <x-button type="button">Dashboard</x-button>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700">
                                    <x-button type="button">Log in</x-button>
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700">
                                        <x-button type="button">Register</x-button>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>

                <div class="flex flex-row-reverse mt-4">

                    <div class="ml-4 text-sm text-gray-500 sm:text-right sm:ml-0">
                        By Patrick Cullen
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
