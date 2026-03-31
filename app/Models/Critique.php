<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Critique extends Authenticatable
{
    protected $table = 'critiques';
    protected $authPasswordName = 'mdp';

    protected $fillable = ['nom_utilisateur', 'email', 'mdp', 'statut_id'];
    protected $hidden = ['mdp'];
}