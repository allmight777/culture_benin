<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\TypeContenu;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class ContenuController extends Controller
{
    public function index()
    {
        $contenus = Contenu::all();
        return view('contenus.index', compact('contenus'));
    }

    public function create()
    {
        $type_contenus = TypeContenu::all();
        $utilisateurs = Utilisateur::all();
        return view('contenus.create', compact('type_contenus','utilisateurs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'date_creation' => 'nullable|date',
            'statut' => 'required|in:Actif,Inactif,Brouillon',
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'typecontenu_id' => 'required|exists:type_contenus,id',
    ]);

        Contenu::create($validated);
        return redirect()->route('contenus.index')->with('success', 'Contenu créé.');
    }

    public function show(string $id)
    {
        $contenu = Contenu::findOrFail($id);
        return view('contenus.show', compact('contenu'));
    }

    public function edit(string $id)
    {
        $contenu = Contenu::findOrFail($id);
        $type_contenu = TypeContenu::all();
        $utilisateurs = Utilisateur::all(); // ➜ AJOUT IMPORTANT
        return view('contenus.edit', compact('contenu', 'type_contenu','utilisateurs'));
    }

    public function update(Request $request, string $id)
    {
        $contenu = Contenu::findOrFail($id);

        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'date_creation' => 'nullable|date',
            'statut' => 'required|in:Actif,Inactif,Brouillon',
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'typecontenu_id' => 'required|exists:type_contenus,id',
        ]);

        $contenu->update($validated);
        return redirect()->route('contenus.index')->with('success', 'Contenu mis à jour.');
    }

    public function destroy(string $id)
    {
        $contenu = Contenu::findOrFail($id);
        $contenu->delete();
        return redirect()->route('contenus.index')->with('success', 'Contenu supprimé.');
    }
}


         