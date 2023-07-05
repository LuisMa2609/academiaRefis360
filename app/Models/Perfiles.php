<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Perfiles extends Model
{
    use HasFactory;
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'perfiles';

    public function usuarios(): BelongsToMany{
        return $this->belongsToMany(Perfiles::class, 'usuarioperfils', 'perfil_id', 'usuario_id');
    }

    public function secciones(): BelongsToMany{
        return $this->belongsToMany(Perfiles::class, 'perfilsecciones', 'perfil_id', 'seccion_id');
    }

}
