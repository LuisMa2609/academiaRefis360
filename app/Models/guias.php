<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class guias extends Model
{
    use HasFactory;

    protected $table = 'guias';

    public function perfiles(): BelongsToMany{
        return $this->belongsToMany(perfiles::class, 'relacionguias', 'guia_id', 'perfil_id');
    }

    public function secciones(): BelongsToMany{
        return $this->belongsToMany(secciones::class, 'relacionguias', 'guia_id', 'seccion_id');
    }

    public function permisos(): BelongsToMany{
        return $this->belongsToMany(permisos::class, 'relacionguias', 'guia_id', 'permisos_id');
    }
}
