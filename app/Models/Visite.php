<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    protected $table = 'visite';
    
    protected $fillable=[
        'date_visite',
        'date_publication',
        'commentaire',
        'critique_id',
        'restaurant_id'
    ];

    public function critique()
    {
        return $this->belongsTo(Critique::class, 'critique_id');
    }
}
