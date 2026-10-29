<x-app-layout>
    @if ($geenProducten)
        {{-- Wireframe-03: na 3 seconden terug naar het Overzicht leveranciers --}}
        @push('head')
            <meta http-equiv="refresh" content="3; url={{ route('leveranciers.index') }}">
        @endpush
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Geleverde producten') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Gegevens van de leverancier --}}
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                        <div>
                            <dt class="font-medium text-gray-500">Naam leverancier</dt>
                            <dd>{{ $leverancier->Naam }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500">Contactpersoon</dt>
                            <dd>{{ $leverancier->ContactPersoon }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500">Leverancier nr</dt>
                            <dd>{{ $leverancier->LeverancierNummer }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500">Mobiel</dt>
                            <dd>{{ $leverancier->Mobiel }}</dd>
                        </div>
                    </dl>

                    {{-- Wireframe-02 / Wireframe-03: geleverde producten --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Naam product</th>
                                    <th class="px-6 py-3 text-center font-medium text-gray-500 uppercase">Aantal in Magazijn</th>
                                    <th class="px-6 py-3 text-center font-medium text-gray-500 uppercase">Verpakkingseenheid</th>
                                    <th class="px-6 py-3 text-center font-medium text-gray-500 uppercase">Laatste levering</th>
                                    <th class="px-6 py-3 text-center font-medium text-gray-500 uppercase">Nieuwe levering</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @if ($geenProducten)
                                    <tr>
                                        <td colspan="5" class="px-6 py-6 text-center">
                                            Dit bedrijf heeft tot nu toe geen producten geleverd aan Jamin
                                            <p class="mt-2 text-sm text-gray-500">
                                                U wordt over 3 seconden doorgestuurd naar het Overzicht leveranciers.
                                            </p>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($producten as $product)
                                        <tr>
                                            <td class="px-6 py-4">{{ $product->ProductNaam }}</td>
                                            <td class="px-6 py-4 text-center">{{ $product->AantalAanwezig ?? '—' }}</td>
                                            <td class="px-6 py-4 text-center">
                                                {{ rtrim(rtrim(number_format((float) $product->VerpakkingsEenheid, 2, ',', ''), '0'), ',') }} kg
                                            </td>
                                            <td class="px-6 py-4 text-center">{{ $product->LaatsteLevering }}</td>
                                            <td class="px-6 py-4 text-center">
                                                @if (Route::has('levering.create'))
                                                    <a href="{{ route('levering.create', ['leverancier' => $leverancier->Id, 'product' => $product->ProductId]) }}"
                                                       title="Nieuwe levering van {{ $product->ProductNaam }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                                        </svg>
                                                    </a>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                                    </svg>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6 flex justify-end gap-3">
                        <a href="{{ route('leveranciers.index') }}"
                           class="inline-block px-4 py-2 bg-[#029ee2] text-white rounded-md">
                            Terug
                        </a>
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
