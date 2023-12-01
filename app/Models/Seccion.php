<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;


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
        return $this->belongsToMany(Perfil::class, 'perfil_secciones_permisos', 'seccion_id', 'perfil_id')
        ->withPivot(['permiso_id', 'status'])
        ->where('status', 1);
        
    }
    
    public function permisos():BelongsToMany{
        return $this->belongsToMany(Permiso::class, 'perfil_secciones_permisos', 'seccion_id', 'permiso_id')
        ->withPivot(['perfil_id', 'status'])
        ->wherePivot('status', 1);
        // ->wherePivot('status', 1, 'perfil_id', [1, 2, 3,4]);

    }

    public function usuarios():BelongsToMany{
        return $this->belongsToMany(User:: class, 'perfiles_users', 'perfil_id', 'usuario_id');

    }

    public function guias(){
        return $this->belongsToMany(Guia::class, 'guia_secciones', 'seccion_id', 'guia_id')
        ->where('status', 1);
    }

    
    public function permisosasignados(){
        return $this->belongsToMany(Permiso::class, 'perfil_secciones_permisos', 'seccion_id', 'permiso_id')
        ->where('status', 1);
    }
}
