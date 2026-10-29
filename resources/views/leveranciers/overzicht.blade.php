<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overzicht leveranciers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Wireframe-01: overzicht van alle leveranciers --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Naam</th>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Contactpersoon</th>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Leveranciernummer</th>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Mobiel</th>
                                    <th class="px-6 py-3 text-center font-medium text-gray-500 uppercase">Aantal verschillende producten</th>
                                    <th class="px-6 py-3 text-center font-medium text-gray-500 uppercase">Toon producten</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($leveranciers as $leverancier)
                                    <tr>
                                        <td class="px-6 py-4">{{ $leverancier->Naam }}</td>
                                        <td class="px-6 py-4">{{ $leverancier->ContactPersoon }}</td>
                                        <td class="px-6 py-4">{{ $leverancier->LeverancierNummer }}</td>
                                        <td class="px-6 py-4">{{ $leverancier->Mobiel }}</td>
                                        <td class="px-6 py-4 text-center">{{ $leverancier->AantalVerschillendeProducten }}</td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="{{ route('leveranciers.producten', $leverancier->Id) }}"
                                               title="Toon de producten van {{ $leverancier->Naam }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                            Er zijn nog geen leveranciers gevonden.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6 text-right">
                        <a href="{{ url('/') }}"
                           class="inline-block px-4 py-2 bg-[#029ee2] text-white rounded-md">
                            Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
