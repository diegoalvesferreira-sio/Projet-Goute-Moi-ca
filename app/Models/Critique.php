<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Critique extends Model
{
    Protected $fillable=[
        'nom',
        'email',
        'mpd',
        'statut_id'
    ];
}
