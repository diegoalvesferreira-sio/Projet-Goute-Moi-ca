<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Critique;  
use App\Models\Critere; 
use App\Models\Statut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $statut = Statut::create(['libelle' => 'salarié']);

        Critique::create([
            'nom'  => 'diego',
            'email'     => 'diego@test.com',
            'mpd'       => bcrypt('password'),
            'statut_id' => $statut->id,
        ]);

        Critere::create(['libelle' => 'Cuisine']);
        Critere::create(['libelle' => 'Service']);
        Critere::create(['libelle' => 'Ambiance']);
    }
}
