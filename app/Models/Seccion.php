<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Seccion extends Model{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'secciones';

    //public function perfiles(){
    //    return $this->belongsToMany(Perfiles::class, 'perfil_secciones_permisos', 'seccion_id', 'perfil_id', 'permiso_id');
    //}
    //
    //public function permisos(){
    //    return $this->belongsToMany(Permisos::class, 'perfil_secciones_permisos', 'seccion_id', 'permiso_id', 'perfil_id');
    //}

    public function perfiles(){
        return $this->belongsToMany(Perfil::class, 'perfil_secciones_permisos', 'seccion_id', 'perfil_id')->withPivot('status');
    }
    public function permisos():BelongsToMany{
        return $this->belongsToMany(Permiso::class, 'perfil_secciones_permisos', 'seccion_id', 'permiso_id')
        ->withPivot('status')
        ->where('status', 1);
    }

    public function guias(){
        return $this->belongsToMany(Guia::class, 'relacionguias', 'seccion_id', 'guia_id')
        ->withPivot(['permisos_id', 'perfil_id'])
        ->where('status', 1);
    }

    public function perfilesasignados(){
        return $this->belongsToMany(Perfil::class, 'perfil_secciones_permisos', 'seccion_id', 'perfil_id')
        ->wherePivot('status', 1);
    }
    public function permisosasignados(){
        return $this->belongsToMany(Permiso::class, 'perfil_secciones_permisos', 'seccion_id', 'permiso_id')
        ->wherePivot('status', 1);
    }
}
