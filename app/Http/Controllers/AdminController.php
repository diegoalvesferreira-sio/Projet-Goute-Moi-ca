<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Critique;

class AdminController extends Controller
{
    // Afficher la liste des critiques
    public function listeCritiques()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect('/login');
        }

        $critiques = Critique::all();
        $user = Auth::guard('admin')->user();

        return view('admin.gestion-critiques', compact('critiques', 'user'));
    }

    // Supprimer un critique
    public function supprimerCritique($id)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect('/login');
        }

        Critique::findOrFail($id)->delete();

        return redirect('/admin/gestion-critiques')->with('success', 'Critique supprimé !');
    }

    // Changer le statut d'un critique
    public function changerStatut($id)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect('/login');
        }

        $critique = Critique::findOrFail($id);

        $critique->statut_id = $critique->statut_id == 1 ? 2 : 1;
        $critique->save();

        return redirect('/admin/gestion-critiques')->with('success', 'Statut modifié !');
    }
}