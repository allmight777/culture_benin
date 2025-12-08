<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use Illuminate\Http\Request;

class LanguesController extends Controller
{
    public function index()
    {
        $langues = Langue::all();
        return view('langues.index', compact('langues'));
    }

    public function create()
    {
        return view('langues.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_langue' => 'required|string|max:255',
            'code_langue' => 'required|string|max:10',
            'description' => 'nullable|string',
        ]);

        Langue::create($validated);
 return redirect()->route('langues.index')->with('success', 'Langue créée.');
    }

    public function show(string $id)
    {
        $langue = Langue::findOrFail($id);
        return view('langues.show', compact('langue'));
    }

    public function edit(string $id)
    {
        $langue = Langue::findOrFail($id);
        return view('langues.edit', compact('langue'));
    }

    public function update(Request $request, string $id)
    {
        $langue = Langue::findOrFail($id);

        $validated = $request->validate([
            'nom_langue' => 'required|string|max:255',
            'code_langue' => 'required|string|max:10',
            'description' => 'nullable|string',
        ]);
    $langue->update($validated);
        return redirect()->route('langues.index')->with('success', 'Langue mise à jour.');
    }

    public function destroy(string $id)
    {
        $langue = Langue::findOrFail($id);
        $langue->delete();
        return redirect()->route('langues.index')->with('success', 'Langue supprimée.');
    }
}
