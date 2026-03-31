<?php

namespace App\Http\Controllers;

use App\Models\Critere;
use App\Models\Evaluer;
use App\Models\Restaurants;
use App\Models\Visite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class Visitecontroller extends Controller
{
     public function criteres()
    {
        $criteres = Critere::all(['id', 'libelle']);

        return response()->json([
            'criteres' => $criteres,
        ]);
    }
    
    public function index(Restaurants $restaurant)
    {
        $visites = Visite::where('restaurant_id',$restaurant ->id)
         ->whereNotNull('date_publication')
            ->orderByDesc('date_visite')
            ->get();

            $visiteIds = $visites->pluck('id');
        $scoreGlobal = round(Evaluer::whereIn('visite_id', $visiteIds)->avg('note') ?? 0, 2);

        $scores = [];
        foreach ($visites as $visite) {
        $scores[$visite->id] = round(Evaluer::where('visite_id', $visite->id)->avg('note') ?? 0, 2);
        }
            return view('liste-visites', compact('restaurant', 'visites', 'scores', 'scoreGlobal'));
    }

    
    public function create(Restaurants $restaurant)
    {
        $criteres = Critere::all();
        return view('ajoutvisite',compact('restaurant','criteres'));
    }

   
    public function store(Request $request, Restaurants $restaurant)
    {
         $request->validate([
            'date_visite' => 'required|date|before_or_equal:today',
            'commentaire' => 'nullable|string|max:1000',
            'notes'       => 'required|array',
            'notes.*'     => 'required|integer|min:1|max:10'
        ]);
        DB::transaction(function () use ($request, $restaurant) {
            $visite = Visite::create([
                'critique_id'      =>3,
                'restaurant_id'    => $restaurant->id,
                'date_visite'      => $request->date_visite,
                'date_publication' => now(),
                'commentaire'      => $request->commentaire,
            ]);

            foreach ($request->notes as $critereId => $note) {
                Evaluer::create([
                    'visite_id'  => $visite->id,
                    'critere_id' => $critereId,
                    'note'       => $note,
                ]);
            }
        });
        return redirect()->route('restaurants.visites.index', $restaurant);
    }

   
    public function show(Visite $visite)
    {
        $évaluations = Evaluer::where('visite_id', $visite->id)
        ->get()
        ->map(function ($eval) {
            $critere = Critere::find($eval->critere_id);
            $eval->libelle = $critere->libelle;
            return $eval;
        });

        $scoremoyenne = round($évaluations->avg('note') ?? 0, 2);

        return view('detail-visite', compact('visite', 'évaluations', 'scoremoyenne'));
    }

    
    public function edit(string $id)
    {
         $request->validate([
            'commentaire' => 'nullable|string|max:3000',
            'notes'       => 'required|array',
            'notes.*'     => 'required|integer|min:1|max:10',
        ]);

        DB::transaction(function () use ($request, $visite) {
            $visite->update(['commentaire' => $request->commentaire]);

            foreach ($request->notes as $critereId => $note) {
                Evaluer::updateOrCreate(
                    ['visite_id' => $visite->id, 'critere_id' => $critereId],
                    ['note'      => $note]
                );
            }
        });

        return redirect()->route('visites.show', $visite);
    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'commentaire' => 'nullable|string|max:3000',
            'notes'       => 'required|array',
            'notes.*'     => 'required|integer|min:1|max:10',
        ]);

        DB::transaction(function () use ($request, $visite) {
            $visite->update(['commentaire' => $request->commentaire]);

            foreach ($request->notes as $critereId => $note) {
                Evaluer::updateOrCreate(
                    ['visite_id' => $visite->id, 'critere_id' => $critereId],
                    ['note'      => $note]
                );
            }
        });

        return redirect()->route('visites.show', $visite);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visite $visite)
    {
         DB::transaction(function () use ($visite) {
            Evaluer::where('visite_id', $visite->id)->delete();
            $visite->delete();
        });

        return redirect()->route('liste-visites', $visite->restaurant_id);
    }
}
