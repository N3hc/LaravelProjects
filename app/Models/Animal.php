<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    protected $table = 'animales';
    protected $fillable = [
        'nombre', 
        'tipo', 
        'peso', 
        'enfermedad', 
        'comentarios', 
        'dueno_id'
    ];

    public function dueno(): BelongsTo
    {
        return $this->belongsTo(Dueno::class, 'dueno_id', 'id_persona');
    }
}