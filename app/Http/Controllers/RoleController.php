<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role; // crée le model si pas là

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code_role' => 'required|string|max:50|unique:roles,code_role',
            'nom'  => 'required|string|max:255',
            'description'=> 'nullable|string|max:1000',
        ]);

        Role::create($data);
        return redirect()->route('roles.index')->with('success','Rôle créé');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'code_role' => 'required|string|max:50|unique:roles,code_role,'.$role->id,
            'nom_role'  => 'required|string|max:255',
            'description'=> 'nullable|string|max:1000',
        ]);

        $role->update($data);
        return redirect()->route('roles.index')->with('success','Rôle mis à jour');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success','Rôle supprimé');
    }
}
