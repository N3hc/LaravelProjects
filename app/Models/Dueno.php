<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dueno extends Model
{
    protected $primaryKey = 'id_persona';

    protected $fillable = ['nombre', 'apellido'];

    public function animales(): HasMany
    {
        return $this->hasMany(Animal::class, 'dueno_id', 'id_persona');
    }
}