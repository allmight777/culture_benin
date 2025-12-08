<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\TypeMedia;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
       $medias = Media::with('type_media')->get();
        return view('medias.index', compact('medias'));
    }

    public function create()
    {
        $type_medias = TypeMedia::all();
        return view('medias.create', compact('type_medias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'chemin' => 'required|string|max:255',
            'description' => 'nullable|string',
            'taille'        => 'required|integer',
            'id_type_media' => 'required|integer|exists:type_medias,id',
        ]);

            Media::create($validated);
                return redirect()->route('medias.index')->with('success', 'Media créé.');
    }

    public function show(string $id)
    {
        $medias = Media::findOrFail($id);
        return view('medias.show', compact('medias'));
    }

    public function edit(string $id)
    {
        $medias = Media::findOrFail($id);
        $type_medias = TypeMedia::all();
        return view('medias.edit', compact('medias', 'type_medias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'chemin' => 'required|string|max:255',
            'id_type_media' => 'required|integer|exists:type_medias,id',
            'description' => 'nullable|string',
            'taille' => 'nullable|integer',
        ]);

        $media = Media::findOrFail($id);
        $media->chemin = $request->chemin;
        $media->id_type_media = $request->id_type_media; // <-- ici
        $media->description = $request->description;
        $media->taille = $request->taille;
        $media->save();

        return redirect()->route('medias.index')->with('success', 'Média mis à jour avec succès !');
    }


            public function destroy(string $id)
            {
                $medias = Media::findOrFail($id);
                $medias->delete();
                return redirect()->route('medias.index')->with('success', 'Media supprimé.');
            }
}

