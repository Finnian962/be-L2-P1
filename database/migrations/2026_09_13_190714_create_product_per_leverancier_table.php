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
        Schema::create('product_per_leverancier', function (Blueprint $table) {
            $table->tinyIncrements('Id');
            $table->tinyInteger('LeverancierId')->unsigned();
            $table->tinyInteger('ProductId')->unsigned();
            $table->date('DatumLevering');
            $table->smallInteger('Aantal')->unsigned();
            $table->date('DatumEerstVolgendeLevering')->nullable();
            $table->boolean('IsActief')->default(true);
            $table->string('Opmerkingen', 250)->nullable();
            $table->dateTime('DatumAangemaakt', 6);
            $table->dateTime('DatumGewijzigd', 6);

            $table->foreign('LeverancierId', 'FK_ProductPerLeverancier_LeverancierId_Leverancier_Id')
                ->references('Id')
                ->on('leverancier');
            $table->foreign('ProductId', 'FK_ProductPerLeverancier_ProductId_Product_Id')
                ->references('Id')
                ->on('product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_per_leverancier');
    }
};