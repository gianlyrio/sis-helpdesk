<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    // Permite que o Laravel salve as colunas name e code no banco
    protected $fillable = ['name', 'code'];

    // Um departamento possui muitos chamados
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
