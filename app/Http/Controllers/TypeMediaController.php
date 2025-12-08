<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeMedia;

class TypeMediaController extends Controller
{
    public function index()
    {
        $typemedias = TypeMedia::all();
        return view('typemedias.index', compact('typemedias'));
    }

    public function create()
    {
        return view('typemedias.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code_media' => 'required|string|max:50|unique:type_medias,code_media',
            'nom_media'  => 'required|string|max:255',
            'description'=> 'nullable|string|max:1000',
        ]);
        TypeMedia::create($data);
        return redirect()->route('typemedias.index')->with('success','Type de média créé');
    }

    public function edit(TypeMedia $typemedia)
    {
        return view('typemedias.edit', compact('typemedia'));
    }

    public function update(Request $request, TypeMedia $typemedia)
    {
        $data = $request->validate([
            'code_media' => 'required|string|max:50|unique:type_medias,code_media,'.$typemedia->id,
            'nom_media'  => 'required|string|max:255',
            'description'=> 'nullable|string|max:1000',
        ]);
        $typemedia->update($data);
        return redirect()->route('typemedias.index')->with('success','Type de média mis à jour');
    }

    public function destroy(TypeMedia $typemedia)
    {
        $typemedia->delete();
        return redirect()->route('typemedias.index')->with('success','Type de média supprimé');
    }
}
