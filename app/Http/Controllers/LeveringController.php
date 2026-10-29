<?php

namespace App\Http\Controllers;

use App\Models\Leverancier;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LeveringController extends Controller
{
    /**
     * Wireframe-04: Levering product.
     *
     * Toont de gegevens van het product en de leverancier en de velden waarin
     * een nieuwe zending ingevuld kan worden.
     */
    public function create(Leverancier $leverancier, Product $product): View
    {
        return $this->form($leverancier, $product);
    }

    /**
     * Slaat de nieuwe zending op.
     *
     * De voorraad en de leveringsregistratie worden bijgewerkt door de stored
     * procedure usp_LeveringToevoegen. Retourneert die procedure de status
     * PRODUCT_INACTIEF, dan verschijnt de melding uit Wireframe-04 en wordt de
     * pagina na 4 seconden doorgestuurd naar het scherm Geleverde producten.
     */
    public function store(Request $request, Leverancier $leverancier, Product $product): RedirectResponse|View
    {
        $request->validate([
            'AantalProducteenheden' => ['required', 'integer', 'min:1', 'max:65535'],
            'DatumEerstVolgendeLevering' => ['required', 'date'],
        ]);

        $uitkomsten = DB::select('CALL usp_LeveringToevoegen(?, ?, ?, ?)', [
            $leverancier->Id,
            $product->Id,
            $request->integer('AantalProducteenheden'),
            $request->date('DatumEerstVolgendeLevering')->format('Y-m-d'),
        ]);

        $uitkomst = $uitkomsten[0] ?? (object) [
            'Resultaat' => 'ONBEKEND',
            'Melding' => 'De levering kon niet verwerkt worden.',
        ];

        if ($uitkomst->Resultaat !== 'OK') {
            return $this->form($leverancier, $product, $uitkomst->Melding, [
                'AantalProducteenheden' => $request->input('AantalProducteenheden'),
                'DatumEerstVolgendeLevering' => $request->input('DatumEerstVolgendeLevering'),
            ]);
        }

        return redirect()
            ->route('leveranciers.producten', ['leverancier' => $leverancier->Id])
            ->with('status', 'De nieuwe zending is toegevoegd aan de voorraad.');
    }

    /**
     * Bouwt het scherm Levering product op.
     */
    private function form(Leverancier $leverancier, Product $product, ?string $melding = null, array $invoer = []): View
    {
        $gegevens = DB::select('CALL usp_LeverancierGegevens(?)', [$leverancier->Id]);

        return view('levering.create', [
            'leverancier' => $gegevens[0] ?? $leverancier,
            'product' => $product,
            'melding' => $melding,
            'invoer' => $invoer,
        ]);
    }
}
