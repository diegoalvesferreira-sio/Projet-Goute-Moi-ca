<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    // On dit à Laravel que le mot de passe s'appelle 'mdp'
    protected $authPasswordName = 'mdp';

    protected $fillable = [
        'email',
        'mdp',
        'role'
    ];

    // On cache le mdp quand on affiche l'utilisateur
    protected $hidden = [
        'mdp'
    ];
}