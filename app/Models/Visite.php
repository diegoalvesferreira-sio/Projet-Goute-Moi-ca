<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    protected $fillable=[
        'date_visite',
        'date_publication',
        'commentaire',
        'critique_id',
        'restaurant_id'
    ];
}
