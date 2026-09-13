<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPerAllergeen extends Model
{
    protected $table = 'product_per_allergeen';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'IsActief' => 'boolean',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'ProductId', 'Id');
    }

    public function allergeen(): BelongsTo
    {
        return $this->belongsTo(Allergeen::class, 'AllergeenId', 'Id');
    }
}