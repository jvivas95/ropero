<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Override;
use App\Models\Categoria;
use App\Models\Entrega;


class Prenda extends Model
{
    // app/Models/Prenda.php
    protected $fillable = ['nombre', 'categoria_id', 'descripcion', 'activo'];

    // Cast attributes to native types
    #[Override]
    protected function casts()
    {
        return ['activo' => 'boolean'];
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function entregas(): BelongsToMany
    {
        return $this->belongsToMany(Entrega::class)
                    ->withPivot('cantidad')
                    ->withTimestamps();

    }
}
