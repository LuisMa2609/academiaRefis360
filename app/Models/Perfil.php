<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Seccion;

class Perfil extends Model{
    use HasFactory;
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'perfiles';

    public function usuarios(): BelongsToMany{
        return $this->belongsToMany(usuarios::class, 'perfiles_users', 'perfil_id', 'usuario_id');
    }

    //public function secciones(){
    //    return $this->belongsToMany(Secciones::class, 'perfil_secciones_permisos', 'perfil_id', 'seccion_id', 'permiso_id');
    //}
    //public function permisos(){
    //    return $this->belongsToMany(Permisos::class, 'perfil_secciones_permisos', 'perfil_id', 'permiso_id', 'seccion_id');
    //}

    public function secciones(): BelongsToMany{
        return $this->belongsToMany(Seccion::class, 'perfil_secciones_permisos', 'perfil_id', 'seccion_id')->withPivot('status');
    }
    public function permisos(){
        return $this->belongsToMany(Permiso::class, 'perfil_secciones_permisos', 'perfil_id', 'permiso_id')->withPivot('status');
    }

    public function seccionesasignados(){
        return $this->belongsToMany(Seccion::class, 'perfil_secciones_permisos', 'perfil_id', 'seccion_id')
        ->wherePivot('status', 1);
    }
    public function permisosasignados(){
        return $this->belongsToMany(Permiso::class, 'perfil_secciones_permisos', 'perfil_id', 'permiso_id')
        ->wherePivot('status', 1);
    }
}
