<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipaleController extends Controller
{
    /**
     * Page d'accueil
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * Page À propos
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Page Domaines culturels
     */
    public function domaines()
    {
        // Exemple: Récupérer les domaines depuis la base de données
        $domaines = [
            ['id' => 1, 'name' => 'Musique', 'slug' => 'musique'],
            ['id' => 2, 'name' => 'Danse', 'slug' => 'danse'],
            ['id' => 3, 'name' => 'Artisanat', 'slug' => 'artisanat'],
        ];
        
        return view('pages.domaines', compact('domaines'));
    }

    /**
     * Page Langues
     */
    public function content()
    {
        return view('pages.content');
    }

    public function gallery()
    {
        return view('pages.gallery');
    }

    public function langues()
    {
        return view('pages.langues');
    }

    /**
     * Page Régions
     */
    public function regions()
    {
        return view('pages.regions');
    }

    /**
     * Page Contact
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Traitement du formulaire de contact
     */
    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Traiter l'envoi d'email ou sauvegarder en base de données
        
        return redirect()->route('contact')
            ->with('success', 'Votre message a été envoyé avec succès!');
    }
}