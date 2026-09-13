<x-app-layout>
    @if ($geenVoorraad)
        @push('head')
            <meta http-equiv="refresh" content="4; url={{ route('magazijn.index') }}">
        @endpush
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Levering Informatie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($geenVoorraad)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p>
                            Er is van dit product op dit moment geen voorraad aanwezig, de verwachte
                            eerstvolgende levering is: <strong>{{ $verwachteLevering?->format('d-m-Y') }}</strong>
                        </p>
                        <p class="mt-4 text-sm text-gray-500">U wordt over 4 seconden doorgestuurd naar het Overzicht Magazijn Jamin.</p>
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                            <div>
                                <dt class="font-medium text-gray-500">Naam leverancier</dt>
                                <dd>{{ $leverancier?->Naam }}</dd>
                            </div>
                            <div>
                                <dt class="font-medium text-gray-500">Contactpersoon leverancier</dt>
                                <dd>{{ $leverancier?->ContactPersoon }}</dd>
                            </div>
                            <div>
                                <dt class="font-medium text-gray-500">Leveranciernummer</dt>
                                <dd>{{ $leverancier?->LeverancierNummer }}</dd>
                            </div>
                            <div>
                                <dt class="font-medium text-gray-500">Mobiel</dt>
                                <dd>{{ $leverancier?->Mobiel }}</dd>
                            </div>
                        </dl>

                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Datum levering</th>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Aantal</th>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Datum eerstvolgende levering</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($leveringen as $levering)
                                    <tr>
                                        <td class="px-6 py-4">{{ $levering->DatumLevering->format('d-m-Y') }}</td>
                                        <td class="px-6 py-4">{{ $levering->Aantal }}</td>
                                        <td class="px-6 py-4">{{ $levering->DatumEerstVolgendeLevering?->format('d-m-Y') ?? '—' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>