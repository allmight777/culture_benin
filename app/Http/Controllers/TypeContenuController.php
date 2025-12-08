<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeContenu;

class TypeContenuController extends Controller
{
    public function index()
    {
        $typecontenus = TypeContenu::all();
        return view('typecontenus.index', compact('typecontenus'));
    }

    public function create()
    {
        return view('typecontenus.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code_type' => 'required|string|max:50|unique:type_contenus,code_type',
            'nom_type'  => 'required|string|max:255',
            'description'=> 'nullable|string|max:1000',
        ]);
        TypeContenu::create($data);
        return redirect()->route('typecontenus.index')->with('success','Type de contenu créé');
    }

    public function edit(TypeContenu $typecontenu)
    {
        return view('typecontenus.edit', compact('typecontenu'));
    }

    public function update(Request $request, TypeContenu $typecontenu)
    {
        $data = $request->validate([
            'code_type' => 'required|string|max:50|unique:type_contenus,code_type,'.$typecontenu->id,
            'nom_type'  => 'required|string|max:255',
            'description'=> 'nullable|string|max:1000',
        ]);
        $typecontenu->update($data);
        return redirect()->route('typecontenus.index')->with('success','Type de contenu mis à jour');
    }

    public function destroy(TypeContenu $typecontenu)
    {
        $typecontenu->delete();
        return redirect()->route('typecontenus.index')->with('success','Type de contenu supprimé');
    }
}
