<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurants;
use App\Models\Visite;
use App\Models\Evaluer;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurants::all();
        $scores = [];
        foreach ($restaurants as $restaurant) {
        $visiteIds = Visite::where('restaurant_id', $restaurant->id)->pluck('id');
        $scores[$restaurant->id] = round(Evaluer::whereIn('visite_id', $visiteIds)->avg('note') ?? 0, 2);
        }
        return view('Resto', compact('restaurants','scores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("ajoutresto");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'localisation'=> 'required',
            'description'=> 'required'
        ]);
        Restaurants::create($request->all());
        return redirect('/restaurants')->with('reussi','Restaurant ajouter !');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $restaurant = Restaurants::find($id);
        return view('modifresto', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $restaurant = Restaurants::find($id);
        $restaurant->update($request->all());
        return redirect('/restaurants')->with('reussi', 'Restaurant modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $restaurant = Restaurants::find($id);
        $restaurant->delete();
        return redirect('/restaurants')->with('reussi', 'Restaurant supprimé !');
    }
}
