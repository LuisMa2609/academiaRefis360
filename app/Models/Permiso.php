<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permiso extends Model{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permisos';

    //public function perfiles(){
    //    return $this->belongsToMany(Perfiles::class, 'perfil_secciones_permisos', 'permiso_id', 'perfil_id', 'seccion_id');
    //}
    //public function secciones(){
    //    return $this->belongsToMany(Secciones::class, 'perfil_secciones_permisos', 'permiso_id', 'seccion_id', 'perfil_id');
    //}

    public function secciones(){
        return $this->belongsToMany(Seccion::class, 'perfil_secciones_permisos', 'permiso_id', 'seccion_id')
        ->withPivot(['perfil_id', 'status'])
        // ->withPivot('status')
        ->where('status', 1);
    }

    public function perfiles(){
        return $this->belongsToMany(Perfil::class, 'perfil_secciones_permisos', 'permiso_id', 'perfil_id')
        ->withPivot(['seccion_id', 'status', 'perfil_id'])
        ->where('status', 1);
    }

    public function usuarios(): BelongsToMany{
        return $this->belongsToMany(usuarios::class, 'perfil_secciones_permisos', 'perfil_id', 'usuario_id')
        ->withPivot('seccion_id', 'status')
        ->wherePivot('status', 1);
    }

    public function guias(): BelongsToMany{
        return $this->belongsToMany(Guia::class, 'relacionguias', 'permisos_id', 'guia_id')
        ->withPivot(['seccion_id', 'perfil_id'])
        ->where('status', 1);
    }
}
