<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Leverancier extends Model
{
    protected $table = 'leverancier';

    protected $primaryKey = 'Id';

    public $incrementing = true;

    public $timestamps = false;

    protected $guarded = [];

    public function producten(): HasMany
    {
        return $this->hasMany(ProductPerLeverancier::class, 'LeverancierId', 'Id');
    }
}