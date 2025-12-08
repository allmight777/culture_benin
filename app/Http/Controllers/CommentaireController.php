<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Utilisateur;
use App\Models\Contenu;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::with(['utilisateur', 'contenu'])->get();
        return view('commentaires.index', compact('commentaires'));
    }

    public function create()
    {
        $utilisateurs = Utilisateur::all();
        $contenus = Contenu::all();
        return view('commentaires.create', compact('utilisateurs', 'contenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'texte' => 'required',
            'note' => 'nullable|integer|min:0|max:5',
            'id_utilisateur' => 'nullable|exists:utilisateurs,id',
            'id_contenu' => 'nullable|exists:contenus,id',
        ]);

        Commentaire::create($request->all());

        return redirect()->route('commentaires.index')->with('success', 'Commentaire ajouté avec succès.');
    }

    public function show($id)
    {
        $commentaire = Commentaire::with(['utilisateur', 'contenu'])->findOrFail($id);
        return view('commentaires.show', compact('commentaire'));
    }

    public function edit($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        $utilisateurs = Utilisateur::all();
        $contenus = Contenu::all();

        return view('commentaires.edit', compact('commentaire', 'utilisateurs', 'contenus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'texte' => 'required',
            'note' => 'nullable|integer|min:0|max:5',
            'id_utilisateur' => 'nullable|exists:utilisateurs,id',
            'id_contenu' => 'nullable|exists:contenus,id',
        ]);

        $commentaire = Commentaire::findOrFail($id);
        $commentaire->update($request->all());

        return redirect()->route('commentaires.index')->with('success', 'Commentaire mis à jour.');
    }

    public function destroy($id)
    {
        Commentaire::findOrFail($id)->delete();

        return redirect()->route('commentaires.index')->with('success', 'Commentaire supprimé.');
    }
}
