<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 // use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Seccion;
use App\Models\Perfil;

class User extends Authenticatable 
{

    

    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'celular',
        'password',
        'puesto'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    
    public function perfiles(): BelongsToMany{
        return $this->belongsToMany(Perfil::class, 'perfiles_users', 'usuario_id', 'perfil_id');
    }


    public function secciones(): BelongsToMany {
        return $this->belongsToMany(Seccion::class, 'perfil_secciones_permisos', 'perfil_id', 'seccion_id')
        ->withPivot('permiso_id');
        // ->wherePivot('status', 1);
    }

    public function permisos(): BelongsToMany{
        return $this->belongsToMany(Permiso::class, 'perfil_secciones_permisos', 'perfil_id', 'permiso_id')
        ->withPivot('seccion_id', 'status');
        // ->wherePivot('status', 1);
    }

    // public function guias(){
    // return $this->belongsToMany(Guia::class, 'relacionguias', 'perfil_id', 'guia_id')
    //     ->withPivot('perfil_id', 'seccion_id', 'permisos_id');
    // }
    
}