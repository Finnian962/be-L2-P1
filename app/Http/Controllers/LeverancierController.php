<?php

namespace App\Http\Controllers;

use App\Models\Leverancier;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LeverancierController extends Controller
{
    /**
     * Wireframe-01: Overzicht leveranciers.
     *
     * Toont alle leveranciers met het aantal verschillende producten dat zij
     * aan Jamin leveren, gesorteerd op dat aantal aflopend.
     * Alle data komt uit de stored procedure usp_OverzichtLeveranciers.
     */
    public function index()
    {
        $leveranciers = DB::select('CALL usp_OverzichtLeveranciers()');

        return view('leveranciers.overzicht', [
            'leveranciers' => $leveranciers,
        ]);
    }

    /**
     * Wireframe-02 en Wireframe-03: Geleverde producten van één leverancier.
     *
     * Toont de gegevens van de leverancier en de door hem geleverde producten
     * met het aantal dat in het magazijn aanwezig is, de verpakkingseenheid en
     * de datum van de laatst geleverde zending (gesorteerd op AantalAanwezig
     * aflopend). Heeft het bedrijf nog niets geleverd, dan verschijnt de melding
     * uit Wireframe-03 en wordt de pagina na 3 seconden opnieuw geladen.
     */
    public function producten(Leverancier $leverancier)
    {
        $gegevens = DB::select('CALL usp_LeverancierGegevens(?)', [$leverancier->Id]);

        $producten = collect(DB::select('CALL usp_GeleverdeProducten(?)', [$leverancier->Id]))
            ->map(function ($product) {
                $product->LaatsteLevering = $product->LaatsteLevering
                    ? Carbon::parse($product->LaatsteLevering)->format('d-m-Y')
                    : '—';

                return $product;
            })
            ->values();

        return view('leveranciers.producten', [
            'leverancier' => $gegevens[0] ?? $leverancier,
            'producten' => $producten,
            'geenProducten' => $producten->isEmpty(),
        ]);
    }
}
