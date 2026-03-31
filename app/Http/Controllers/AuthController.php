<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Critique;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLogin()
    {
        return view('login');
    }

    // Traiter le formulaire de connexion
    public function login(Request $request)
    {
        // 1. Validation des champs
        $request->validate([
            'email' => 'required|email',
            'mdp'   => 'required|min:6'
        ]);

        // 2. Credentials à vérifier
        $useranswer = [
            'email'    => $request->email,
            'password' => $request->mdp
        ];

        // 3. On essaie de connecter comme admin
        if (Auth::guard('admin')->attempt($useranswer)) {
            $user = Auth::guard('admin')->user();
            return redirect('/admin/dashboard/' . $user->id);
        }

        // 4. On essaie de connecter comme critique
        if (Auth::guard('web')->attempt($useranswer)) {
            $user = Auth::guard('web')->user();
            return redirect('/critique/dashboard/' . $user->id);
        }

        // 5. Aucun des deux → erreur
        return back()->withErrors(['email' => 'Email ou mot de passe incorrect']);
    }

    // Afficher le dashboard admin
    public function dashboardAdmin($id)
    {
        $user = Auth::guard('admin')->user();
        return view('admin.dashboard', compact('user'));
    }

    public function dashboardCritique($id)
{
    $user = Auth::guard('web')->user();
    return view('critique.dashboard', compact('user'));
}

// Afficher le formulaire d'inscription
public function showRegister()
{
    return view('register');
}

// Traiter le formulaire d'inscription
public function register(Request $request)
{
    // 1. Validation des champs
    $request->validate([
        'nom_utilisateur' => 'required|string',
        'email'           => 'required|email|unique:critiques',
        'mdp'             => 'required|min:6',
    ]);

    // 2. Créer le critique
    Critique::create([
        'nom_utilisateur' => $request->nom_utilisateur,
        'email'           => $request->email,
        'mdp'             => Hash::make($request->mdp),
        'statut_id'       => 1 // affilié par défaut
    ]);

    // 3. Rediriger vers le login
    return redirect('/login')->with('success', 'Compte créé avec succès !');
}

    // Déconnexion
    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('web')->logout();
        return redirect('/login');
    }
}