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
        Schema::create('magazijn', function (Blueprint $table) {
            $table->tinyIncrements('Id');
            $table->tinyInteger('ProductId')->unsigned();
            $table->decimal('VerpakkingsEenheid', 5, 2);
            $table->smallInteger('AantalAanwezig')->unsigned()->nullable();
            $table->boolean('IsActief')->default(true);
            $table->string('Opmerkingen', 250)->nullable();
            $table->dateTime('DatumAangemaakt', 6);
            $table->dateTime('DatumGewijzigd', 6);

            $table->foreign('ProductId', 'FK_Magazijn_ProductId_Product_Id')
                ->references('Id')
                ->on('product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magazijn');
    }
};