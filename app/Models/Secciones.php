<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Secciones extends Model
{
    use HasFactory;

    public function perfiles(): BelongsToMany{
        return $this->belongsToMany(Perfiles::class, 'perfilsecciones', 'seccion_id', 'perfil_id');
    }   

}
