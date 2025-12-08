<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    // Affiche la liste des régions
    public function index()
    {
        $regions = Region::all();
        return view('regions.index', compact('regions'));
    }

    // Affiche le formulaire de création d'une nouvelle région
    public function create()
    {
        return view('regions.create');
    }

    // Enregistre une nouvelle région
    public function store(Request $request)
    {
        $request->validate([
            'nom_region' => 'required|string|max:255',
            'description' => 'nullable|string',
            'population' => 'required|integer|min:0',
            'superficie' => 'required|numeric|min:0',
            'localisation' => 'required|string|max:255',
        ]);

        Region::create([
            'nom_region' => $request->nom_region,
            'description' => $request->description,
            'population' => $request->population,
            'superficie' => $request->superficie,
            'localisation' => $request->localisation,
        ]);

        return redirect()->route('regions.index')->with('success', 'Région créée avec succès.');
    }

    // Affiche le formulaire pour éditer une région
    public function edit(Region $region)
    {
        return view('regions.edit', compact('region'));
    }

    // Met à jour une région existante
    public function update(Request $request, Region $region)
    {
        $request->validate([
            'nom_region' => 'required|string|max:255',
            'description' => 'nullable|string',
            'population' => 'required|integer|min:0',
            'superficie' => 'required|numeric|min:0',
            'localisation' => 'required|string|max:255',
        ]);

        $region->update([
            'nom_region' => $request->nom_region,
            'description' => $request->description,
            'population' => $request->population,
            'superficie' => $request->superficie,
            'localisation' => $request->localisation,
        ]);

        return redirect()->route('regions.index')->with('success', 'Région mise à jour avec succès.');
    }

    // Supprime une région
    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->route('regions.index')->with('success', 'Région supprimée avec succès.');
    }

    // Affiche une région spécifique (optionnel)
    public function show(Region $region)
    {
        return view('regions.show', compact('region'));
    }
}
