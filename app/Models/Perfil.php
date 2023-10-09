<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Seccion;
use App\Models\Guia;

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

    public function secciones(): BelongsToMany{
        return $this->belongsToMany(Seccion::class, 'perfil_secciones_permisos', 'perfil_id', 'seccion_id')
        ->withPivot('status')
        ->where('status', 1);
    }
    
    public function permisos(){
        return $this->belongsToMany(Permiso::class, 'perfil_secciones_permisos', 'perfil_id', 'permiso_id')
        ->withPivot('status');
        // ->where('status', 1);

    }

    // public function guias() {
    //     return $this->belongsToMany(Guia::class, 'relacionguias', 'perfil_id', 'guia_id')
    //     ->withPivot(['permisos_id', 'seccion_id'])
    //     ->where('status', 1);
    // }

    // public function guiasPorSeccionYPermiso($seccion, $permiso) {
    //     return $this->guias()
    //                 ->where('seccion_id', $seccion->id)
    //                 ->where('permisos_id', $permiso->id)
    //                 ->get();
    // }
}
