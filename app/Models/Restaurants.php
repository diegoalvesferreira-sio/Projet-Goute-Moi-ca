<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    protected $table = 'restaurant';

    protected $fillable=[
        'nom',
        'description',
        'localisation'
    ];
}
        
    

