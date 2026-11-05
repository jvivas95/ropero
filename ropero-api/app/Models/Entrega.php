<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Override;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Persona;
use App\Models\Voluntario;
use App\Models\Prenda;

class Entrega extends Model
{
    // app/Models/Entrega.php
    protected $fillable = ['persona_id', 'voluntario_id', 'entregada_en'];

    #[Override]
    protected function casts()
    {
        return ['entregada_en' => 'datetime'];
    }

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }

    public function voluntario(): BelongsTo
    {
        return $this->belongsTo(Voluntario::class);
    }

    public function prendas(): BelongsToMany
    {
        return $this->belongsToMany(Prenda::class)
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }
}
