<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Models\Perfiles;

class Perfiles extends Model
{
    use HasFactory;
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'perfiles';

    public function User(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'perfiles');
    }


}
