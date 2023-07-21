<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Secciones extends Model{
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
        return $this->belongsToMany(Perfiles::class, 'perfil_secciones_permisos', 'seccion_id', 'perfil_id')->withPivot('permiso_id');
    }
    public function permisos(){
        return $this->belongsToMany(Permisos::class, 'perfil_secciones_permisos', 'seccion_id', 'permiso_id')->withPivot('perfil_id');
    }

}
