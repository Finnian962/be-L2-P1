<?php

namespace App\Http\Controllers;

use App\Models\Magazijn;

class MagazijnController extends Controller
{
    /**
     * Toon het overzicht van alle producten in het magazijn,
     * gesorteerd op Barcode oplopend.
     */
    public function index()
    {
        $producten = Magazijn::query()
            ->join('product', 'product.Id', '=', 'magazijn.ProductId')
            ->select('magazijn.*')
            ->with('product')
            ->orderBy('product.Barcode')
            ->get();

        return view('magazijn.index', [
            'producten' => $producten,
        ]);
    }

    /**
     * Toon de leveringsinformatie van een gekozen product.
     */
    public function leveringen(Magazijn $magazijn)
    {
        $magazijn->load('product');

        $leveringen = $magazijn->product->leveranciers()
            ->with('leverancier')
            ->orderBy('DatumLevering')
            ->get();

        $leverancier = $leveringen->first()?->leverancier;

        $geenVoorraad = $magazijn->AantalAanwezig === null;

        $verwachteLevering = $geenVoorraad
            ? $leveringen->last()?->DatumEerstVolgendeLevering
            : null;

        return view('magazijn.leveringen', [
            'magazijn' => $magazijn,
            'leveringen' => $leveringen,
            'leverancier' => $leverancier,
            'geenVoorraad' => $geenVoorraad,
            'verwachteLevering' => $verwachteLevering,
        ]);
    }

    /**
     * Toon de allergeneninformatie van een gekozen product.
     */
    public function allergenen(Magazijn $magazijn)
    {
        $magazijn->load('product');

        $allergenen = $magazijn->product->allergenen()
            ->with('allergeen')
            ->get()
            ->sortBy(fn ($koppeling) => $koppeling->allergeen->Naam)
            ->values();

        return view('magazijn.allergenen', [
            'magazijn' => $magazijn,
            'allergenen' => $allergenen,
            'geenAllergenen' => $allergenen->isEmpty(),
        ]);
    }
}