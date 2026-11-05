<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Override;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Entrega;


class Voluntario extends Model
{
    // app/Models/Voluntario.php
    protected $fillable = ['nombre', 'activo'];

    #[Override]
    protected function casts()
    {
        return ['activo' => 'boolean'];
    }

    public function Entregas (): HasMany
    {
        return $this->hasMany(Entrega::class);
    }
}
