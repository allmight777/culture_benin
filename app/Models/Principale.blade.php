<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipaleController extends Controller
{
    public function accueil() { return view('pages.accueil'); }
    public function about() { return view('pages.about'); }
    public function domaines() { return view('pages.domaines'); }
    public function langues() { return view('pages.langues'); }
    public function regions() { return view('pages.regions'); }
    public function content() { return view('pages.content'); }
    public function gallery() { return view('pages.gallery'); }
    public function contact() { return view('pages.contact'); }
}
