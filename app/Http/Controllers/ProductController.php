<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Kopje 2: Toevoegen producten.
     *
     * Overzicht van alle producten met de leverancier die het product levert,
     * zodat er direct een nieuwe levering gestart kan worden.
     * Alle data komt uit de stored procedure usp_OverzichtProducten.
     */
    public function index(): View
    {
        $producten = collect(DB::select('CALL usp_OverzichtProducten()'))
            ->map(function ($product) {
                $product->LaatsteLevering = $product->LaatsteLevering
                    ? Carbon::parse($product->LaatsteLevering)->format('d-m-Y')
                    : '—';

                return $product;
            })
            ->values();

        return view('producten.index', [
            'producten' => $producten,
        ]);
    }
}
