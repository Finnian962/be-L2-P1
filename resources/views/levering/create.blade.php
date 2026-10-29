<x-app-layout>
    @if ($melding)
        {{-- Wireframe-04: na 4 seconden terug naar het scherm Geleverde producten --}}
        @push('head')
            <meta http-equiv="refresh" content="4; url={{ route('leveranciers.producten', ['leverancier' => $leverancier->Id]) }}">
        @endpush
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Levering product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($melding)
                        <div class="mb-6 rounded-md bg-red-50 border border-red-200 p-4 text-red-700" role="alert">
                            {{ $melding }}
                            <p class="mt-2 text-sm text-red-500">
                                U wordt over 4 seconden doorgestuurd naar het scherm Geleverde producten.
                            </p>
                        </div>
                    @elseif (session('status'))
                        <div class="mb-6 rounded-md bg-green-50 border border-green-200 p-4 text-green-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Wireframe-04: gegevens product en leverancier --}}
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                        <div>
                            <dt class="font-medium text-gray-500">Product</dt>
                            <dd>{{ $product->Naam }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500">Leverancier</dt>
                            <dd>{{ $leverancier->Naam }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500">Contactpersoon</dt>
                            <dd>{{ $leverancier->ContactPersoon }}</dd>
                        </div>
                        <div>
                            <dt class="font-medium text-gray-500">Mobiel</dt>
                            <dd>{{ $leverancier->Mobiel }}</dd>
                        </div>
                    </dl>

                    <form method="POST"
                          action="{{ route('levering.store', ['leverancier' => $leverancier->Id, 'product' => $product->Id]) }}">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="AantalProducteenheden" class="block font-medium text-gray-700 mb-1">
                                    Aantal producteenheden
                                </label>
                                <input
                                    id="AantalProducteenheden"
                                    name="AantalProducteenheden"
                                    type="number"
                                    min="1"
                                    max="65535"
                                    required
                                    value="{{ old('AantalProducteenheden', $invoer['AantalProducteenheden'] ?? '') }}"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                >
                                @error('AantalProducteenheden')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="DatumEerstVolgendeLevering" class="block font-medium text-gray-700 mb-1">
                                    Datum eerstvolgende levering
                                </label>
                                <input
                                    id="DatumEerstVolgendeLevering"
                                    name="DatumEerstVolgendeLevering"
                                    type="date"
                                    required
                                    value="{{ old('DatumEerstVolgendeLevering', $invoer['DatumEerstVolgendeLevering'] ?? '') }}"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                >
                                @error('DatumEerstVolgendeLevering')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap justify-between gap-3">
                            <button
                                type="submit"
                                class="inline-block px-6 py-2 bg-[#029ee2] hover:bg-[#0288c8] text-white rounded-md"
                            >
                                Sla op
                            </button>

                            <div class="flex gap-3">
                                <a href="{{ route('leveranciers.producten', ['leverancier' => $leverancier->Id]) }}"
                                   class="inline-block px-6 py-2 bg-[#029ee2] hover:bg-[#0288c8] text-white rounded-md">
                                    Terug
                                </a>
                                <a href="{{ url('/') }}"
                                   class="inline-block px-6 py-2 bg-[#029ee2] hover:bg-[#0288c8] text-white rounded-md">
                                    Home
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
