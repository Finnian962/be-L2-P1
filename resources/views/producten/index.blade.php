<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Toevoegen producten') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4 text-sm text-gray-500">
                        Klik op het plus-icoon om een nieuwe zending van het product toe te voegen aan de voorraad
                        in het magazijn.
                    </p>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Naam product</th>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Barcode</th>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Leverancier</th>
                                    <th class="px-6 py-3 text-center font-medium text-gray-500 uppercase">Aantal in Magazijn</th>
                                    <th class="px-6 py-3 text-center font-medium text-gray-500 uppercase">Verpakkingseenheid</th>
                                    <th class="px-6 py-3 text-center font-medium text-gray-500 uppercase">Laatste levering</th>
                                    <th class="px-6 py-3 text-center font-medium text-gray-500 uppercase">Nieuwe levering</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($producten as $product)
                                    <tr class="{{ $product->ProductIsActief ? '' : 'bg-red-50' }}">
                                        <td class="px-6 py-4">
                                            {{ $product->ProductNaam }}
                                            @unless ($product->ProductIsActief)
                                                <span class="ms-2 inline-block px-2 py-0.5 rounded bg-red-100 text-red-700 text-xs">
                                                    Niet meer leverbaar
                                                </span>
                                            @endunless
                                        </td>
                                        <td class="px-6 py-4">{{ $product->Barcode }}</td>
                                        <td class="px-6 py-4">{{ $product->LeverancierNaam }}</td>
                                        <td class="px-6 py-4 text-center">{{ $product->AantalAanwezig ?? '—' }}</td>
                                        <td class="px-6 py-4 text-center">
                                            {{ rtrim(rtrim(number_format((float) $product->VerpakkingsEenheid, 2, ',', ''), '0'), ',') }} kg
                                        </td>
                                        <td class="px-6 py-4 text-center">{{ $product->LaatsteLevering }}</td>
                                        <td class="px-6 py-4 text-center">
                                            @if ($product->LeverancierId)
                                                <a href="{{ route('levering.create', ['leverancier' => $product->LeverancierId, 'product' => $product->ProductId]) }}"
                                                   title="Nieuwe levering van {{ $product->ProductNaam }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                                    </svg>
                                                </a>
                                            @else
                                                <span class="text-gray-300" title="Dit product heeft nog geen leverancier">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                                    </svg>
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                            Er zijn geen producten gevonden.
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
