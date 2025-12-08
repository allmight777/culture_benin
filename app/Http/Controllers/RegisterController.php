<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Role;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Affiche le formulaire d'inscription
    public function create()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    // Traite la soumission du formulaire
    public function store(Request $request)
    {
        $validated = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
            'password' => 'required|string|min:8|confirmed', // password_confirmation attendu
            'terms' => 'accepted',
            'id_role' => 'nullable|integer|exists:roles,id',
        ]);

        // Si aucun rôle fourni, on tente de récupérer un rôle 'user' par défaut (optionnel)
        $roleId = $validated['id_role'] ?? null;
        if (!$roleId) {
            $defaultRole = Role::where('name', 'user')->orWhere('slug','user')->first();
            $roleId = $defaultRole ? $defaultRole->id : null;
        }

        // IMPORTANT : on **n'hash pas** ici car le mutator du modèle gère déjà le hash.
        $user = Utilisateur::create([
            'prenom' => $validated['prenom'],
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'mot_de_passe' => $validated['password'], // mutator -> hash
            'id_role' => $roleId,
            'date_inscription' => now(),
        ]);

        return redirect()->route('login')->with('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
    }
}
