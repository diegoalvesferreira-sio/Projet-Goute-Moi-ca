<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrateur extends Authenticatable
{
    protected $table = 'administrateur';
    protected $authPasswordName = 'mdp';

    protected $fillable = ['nom_utilisateur', 'email', 'mdp'];
    protected $hidden = ['mdp'];
}