<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permisos extends Model{
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
        return $this->belongsToMany(Secciones::class, 'perfil_secciones_permisos', 'permiso_id', 'seccion_id')->withPivot('perfil_id');
    }

    public function perfiles(){
        return $this->belongsToMany(Perfiles::class, 'perfil_secciones_permisos', 'permiso_id', 'perfil_id')->withPivot('seccion_id');
    }

}
