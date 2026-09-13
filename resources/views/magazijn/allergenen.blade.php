<x-app-layout>
    @if ($geenAllergenen)
        @push('head')
            <meta http-equiv="refresh" content="4; url={{ route('magazijn.index') }}">
        @endpush
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overzicht Allergenen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($geenAllergenen)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p>In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken.</p>
                        <p class="mt-4 text-sm text-gray-500">U wordt over 4 seconden doorgestuurd naar het Overzicht Magazijn Jamin.</p>
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                            <div>
                                <dt class="font-medium text-gray-500">Naam Product</dt>
                                <dd>{{ $magazijn->product->Naam }}</dd>
                            </div>
                            <div>
                                <dt class="font-medium text-gray-500">Barcode</dt>
                                <dd>{{ $magazijn->product->Barcode }}</dd>
                            </div>
                        </dl>

                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Naam</th>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Omschrijving</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($allergenen as $koppeling)
                                    <tr>
                                        <td class="px-6 py-4">{{ $koppeling->allergeen->Naam }}</td>
                                        <td class="px-6 py-4">{{ $koppeling->allergeen->Omschrijving }}</td>
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