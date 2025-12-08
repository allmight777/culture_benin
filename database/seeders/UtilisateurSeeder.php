<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;

class UtilisateurSeeder extends Seeder
{
    public function run()
    {
        Utilisateur::create([
            'nom' => 'Comlan',
            'prenom' => 'Maurice',
            'email' => 'mauricecomlan@gmail.com',
            'mot_de_passe' => Hash::make('eneam123'), // mot de passe initial
            'sexe' => 'M',
            'date_naissance' => '1990-01-01',
            'date_inscription' => now(),
            'statut' => 'Actif',
            'id_role' => 2, // ID du rôle Admin
            'id_langue' => 1, // tu peux mettre l'id d'une langue si nécessaire
        ]);
    }
}
