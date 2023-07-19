<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Secciones extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'secciones';

    public function perfiles(){
        return $this->belongsToMany(Perfiles::class, 'perfilsecciones', 'seccion_id', 'perfil_id');
    }   

}
