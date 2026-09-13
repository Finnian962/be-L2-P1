<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Ingelogd als <strong>{{ Auth::user()->name }}</strong></p>
                    <p class="mt-2">Uw rol: <span class="inline-block px-2 py-1 rounded-md bg-blue-100 text-blue-800 text-sm">{{ Auth::user()->Role }}</span></p>
                    <a href="{{ route('magazijn.index') }}" class="mt-6 inline-block px-4 py-2 bg-[#029ee2] text-white rounded-md">
                        Naar Overzicht Magazijn Jamin
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
