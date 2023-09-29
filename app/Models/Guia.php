<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Perfil;
use App\Models\Seccion;
use App\Models\Permiso;
use App\Models\PerfilSeccionPermiso;
use App\Models\Relacionguias;


class Guia extends Model
{
    use HasFactory;

    protected $table = 'guias';

    protected $fillable = [
        'nombre',
        'descripcion'

    ];

    public function perfiles(): BelongsToMany{
        return $this->belongsToMany(Perfil::class, 'relacionguias', 'guia_id', 'perfil_id');
            // ->withPivot(['seccion_id', 'permisos_id']);
    }

    public function secciones(): BelongsToMany{
        return $this->belongsToMany(Seccion::class, 'relacionguias', 'guia_id', 'seccion_id');
            // ->withPivot(['perfil_id', 'permisos_id']);
    }

    public function permisos(): BelongsToMany{
        return $this->belongsToMany(Permiso::class, 'relacionguias', 'guia_id', 'permisos_id');
            // ->withPivot(['perfil_id', 'seccion_id']);
    }
    
    public function perfilAsignado(): BelongsToMany{
        return $this->belongsToMany(Perfil::class, 'perfil_secciones_permisos', 'perfil_id', 'perfil_id')
        ->wherePivot('status', 1);
    }

    public function seccionAsignado(): BelongsToMany{
        return $this->belongsToMany(Perfil::class, 'perfil_secciones_permisos', 'seccion_id', 'seccion_id')
        ->wherePivot('status', 1);
    }

    public function permisoAsignado(): BelongsToMany{
        return $this->belongsToMany(Perfil::class, 'perfil_secciones_permisos', 'permiso_id', 'permiso_id')
        ->wherePivot('status', 1);
    }

    public function perfil_secciones_permisos(): BelongsToMany{
        return $this->belongsToMany(PerfilSeccionPermiso:: class, 'perfil_secciones_permisos', 'guia_id', 'perfil_id')
        ->withPivot(['permiso_id', 'seccion_id']);
    }

    public function relacionguias(): BelongsToMany{
        return $this->belongsToMany(RelacionGuias::class, 'relacionguias', 'guia_id', 'perfil_id')
            ->withPivot('permisos_id', 'seccion_id');
    }

    

}
