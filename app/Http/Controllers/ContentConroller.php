<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentConroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($type, $id)
    {
        $user = auth()->user();

        $hasAccess = Payment::where('id_utilisateur', $user->id)
            ->where('type_contenu', $type_contenu)
            ->where('id_contenu', $id)
            ->where('status', 'completed')
            ->exists();

        if (isset($user->role) && $user->role !== 'reader') {
            $hasAccess = true;
        }

        if (!$hasAccess) {
            // Afficher la page de pré-visualisation + bouton payer (modal)
            return view('content.preview', compact('type_contenu', 'id'));
        }

        // Afficher le vrai contenu premium
        // $content = // récupère ton contenu...
        // return view('content.show', compact('content'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
