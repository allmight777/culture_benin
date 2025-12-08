<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Role;
use App\Models\Langue;

class UtilisateurController extends Controller
{
    public function index()
    {
        $utilisateurs = Utilisateur::all();
        $roles = Role::all();
        return view('utilisateurs.index', compact('utilisateurs','roles'));
    }

    public function create()
    {
        $roles = Role::all();
        $langues = Langue::all(); // si tu veux remplir le select des langues
        return view('utilisateurs.create', compact('roles', 'langues'));
    }

    public function store(Request $request)
{
    // Validation des champs obligatoires
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|unique:utilisateurs,email',
        'mot_de_passe' => 'required|string|min:6|confirmed', // nécessite mot_de_passe_confirmation
        'sexe' => 'required|string|max:1',
        'date_naissance' => 'nullable|date',
        'statut' => 'nullable|string|max:50',
        'photo' => 'nullable|image|max:2048',
        'id_role' => 'required|integer|exists:roles,id',
        'id_langue' => 'nullable|integer|exists:langues,id',
    ]);

    // Hash du mot de passe
    $validated['mot_de_passe'] = bcrypt($validated['mot_de_passe']);

    // Gestion de la photo
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('photos', 'public');
        $validated['photo'] = $path;
    }

    // Création de l'utilisateur
    Utilisateur::create($validated);

    return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur créé avec succès.');
}


    public function show(string $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        return view('utilisateurs.show', compact('utilisateur'));
    }

    public function edit(string $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $roles = Role::all();
        $langues = Langue::all();
        return view('utilisateurs.edit', compact('utilisateur', 'roles', 'langues'));
    }

    public function update(Request $request, string $id)
    {
       $utilisateur = Utilisateur::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email,' . $id,
            'mot_de_passe' => 'nullable|string|min:6',
            'sexe' => 'required|string|max:1',
            'date_naissance' => 'nullable|date',
            'statut' => 'nullable|string|max:50',
            'photo' => 'nullable|string|max:255',
            'id_role' => 'required|integer|exists:roles,id',
            'id_langue' => 'nullable|integer|exists:langues,id',
        ]);

        if (!empty($validated['mot_de_passe'])) {
            $validated['mot_de_passe'] = bcrypt($validated['mot_de_passe']);
        } else {
            unset($validated['mot_de_passe']);
        }

        $utilisateur->update($validated);
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur mis à jour.');
    }

    public function destroy(string $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé.');
    }
}
