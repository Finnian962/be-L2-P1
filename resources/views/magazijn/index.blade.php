<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overzicht Magazijn Jamin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Barcode</th>
                                <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Naam</th>
                                <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">VerpakkingsEenheid (kg)</th>
                                <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">AantalAanwezig</th>
                                <th class="px-6 py-3 text-center font-medium text-gray-500 uppercase">Leverantie Info</th>
                                <th class="px-6 py-3 text-center font-medium text-gray-500 uppercase">Allergenen Info</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($producten as $product)
                                <tr>
                                    <td class="px-6 py-4">{{ $product->product->Barcode }}</td>
                                    <td class="px-6 py-4">{{ $product->product->Naam }}</td>
                                    <td class="px-6 py-4">{{ number_format((float) $product->VerpakkingsEenheid, 2, ',', '') }}</td>
                                    <td class="px-6 py-4">{{ $product->AantalAanwezig ?? '—' }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('magazijn.leveringen', $product) }}" title="Bekijk leveringsinformatie">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 inline" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('magazijn.allergenen', $product) }}" title="Bekijk allergeneninformatie">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 inline" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>