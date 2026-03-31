<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluer extends Model
{
    protected $table = 'evaluer';
    
    protected $fillable=[
        'note',
        'visite_id',
        'critere_id'
    ];
}
