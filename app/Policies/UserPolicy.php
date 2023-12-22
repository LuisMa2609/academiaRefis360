<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function admin(User $user){
        return $user->rol == '1';
    }

    public function user(User $user){
        return $user->puesto == 'Practicante';
    }

    public function adminOrUser(User $user){
        return $this->admin($user) || $this->user($user);
    }
}
