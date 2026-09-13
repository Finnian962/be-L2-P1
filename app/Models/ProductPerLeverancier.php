<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPerLeverancier extends Model
{
    protected $table = 'product_per_leverancier';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'DatumLevering' => 'date',
        'DatumEerstVolgendeLevering' => 'date',
        'IsActief' => 'boolean',
    ];

    public function leverancier(): BelongsTo
    {
        return $this->belongsTo(Leverancier::class, 'LeverancierId', 'Id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'ProductId', 'Id');
    }
}