<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Entrega;

class Persona extends Model
{
    // app/Models/Persona.php
    protected $fillable = ['nombre', 'apellido', 'telefono'];

    public function entregas(): HasMany
    {
        return $this->hasMany(Entrega::class);
    }
}
