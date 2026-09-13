<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Allergeen extends Model
{
    protected $table = 'allergeen';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $guarded = [];

    public function producten(): HasMany
    {
        return $this->hasMany(ProductPerAllergeen::class, 'AllergeenId', 'Id');
    }
}