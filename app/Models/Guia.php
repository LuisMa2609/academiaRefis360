<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Perfil;
use App\Models\Seccion;
use App\Models\Permiso;


class Guia extends Model
{
    use HasFactory;

    protected $table = 'guias';

    public function relacion(){
        return $this->belongsToMany(RelacionGuias::class, 'relacionguias', 'guia_id', 'perfil_id')
            ->withPivot(['permisos_id', 'seccion_id'])
            ->withTimestamps();
    }

    public function perfiles(): BelongsToMany{
        return $this->belongsToMany(Perfil::class, 'relacionguias', 'guia_id', 'perfil_id');
    }

    public function secciones(): BelongsToMany{
        return $this->belongsToMany(Seccion::class, 'relacionguias', 'guia_id', 'seccion_id');
    }

    public function permisos(): BelongsToMany{
        return $this->belongsToMany(Permiso::class, 'relacionguias', 'guia_id', 'permisos_id');
    }
}
