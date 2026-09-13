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
        Schema::create('product_per_allergeen', function (Blueprint $table) {
            $table->tinyIncrements('Id');
            $table->tinyInteger('ProductId')->unsigned();
            $table->tinyInteger('AllergeenId')->unsigned();
            $table->boolean('IsActief')->default(true);
            $table->string('Opmerkingen', 250)->nullable();
            $table->dateTime('DatumAangemaakt', 6);
            $table->dateTime('DatumGewijzigd', 6);

            $table->foreign('ProductId', 'FK_ProductPerAllergeen_ProductId_Product_Id')
                ->references('Id')
                ->on('product');
            $table->foreign('AllergeenId', 'FK_ProductPerAllergeen_AllergeenId_Allergeen_Id')
                ->references('Id')
                ->on('allergeen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_per_allergeen');
    }
};