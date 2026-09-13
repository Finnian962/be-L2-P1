<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leverancier', function (Blueprint $table) {
            $table->tinyIncrements('Id');
            $table->string('Naam', 50);
            $table->string('ContactPersoon', 50);
            $table->string('LeverancierNummer', 11);
            $table->string('Mobiel', 12);
            $table->boolean('IsActief')->default(true);
            $table->string('Opmerkingen', 250)->nullable();
            $table->dateTime('DatumAangemaakt', 6);
            $table->dateTime('DatumGewijzigd', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leverancier');
    }
};