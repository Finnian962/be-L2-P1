<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Jamin – Inloggen</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="min-h-screen bg-gray-100 font-sans text-gray-900 antialiased flex items-center justify-center p-4">
        <div class="w-full max-w-sm">
            <div class="mb-6 text-center">
                <div class="mx-auto mb-3 h-12 w-12 rounded-full bg-[#029ee2] flex items-center justify-center text-white text-xl font-bold">
                    J
                </div>
                <h1 class="text-2xl font-bold">Jamin</h1>
                <p class="text-sm text-gray-500">Magazijn – log in om verder te gaan</p>
            </div>

            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
                @if ($errors->any())
                    <div class="mb-4 rounded-md bg-red-50 border border-red-200 p-3 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <label for="email" class="block text-sm font-medium text-gray-700">E-mailadres</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        required
                        autofocus
                        value="{{ old('email') }}"
                        class="mt-1 mb-4 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    >

                    <label for="password" class="block text-sm font-medium text-gray-700">Wachtwoord</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="mt-1 mb-4 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    >

                    <label class="flex items-center gap-2 text-sm text-gray-600 mb-4">
                        <input name="remember" type="checkbox" value="1" class="rounded border-gray-300">
                        Onthoud mij
                    </label>

                    <button type="submit"
                            class="w-full rounded-md bg-[#029ee2] px-4 py-2 font-semibold text-white transition hover:bg-[#0288c8] cursor-pointer">
                        Inloggen
                    </button>
                </form>
            </div>

            <p class="mt-4 text-center text-xs text-gray-400">
                medewerker@jamin.nl / password
            </p>
        </div>
    </body>
</html>
