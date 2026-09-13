<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table = 'product';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $guarded = [];

    public function magazijn(): HasMany
    {
        return $this->hasMany(Magazijn::class, 'ProductId', 'Id');
    }

    public function leveranciers(): HasMany
    {
        return $this->hasMany(ProductPerLeverancier::class, 'ProductId', 'Id');
    }

    public function allergenen(): HasMany
    {
        return $this->hasMany(ProductPerAllergeen::class, 'ProductId', 'Id');
    }
}