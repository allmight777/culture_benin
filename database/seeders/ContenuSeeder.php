<?php
// database/seeders/ContenuSeeder.php

namespace Database\Seeders;

use App\Models\Contenu;
use App\Models\Media;
use App\Models\TypeContenu;
use App\Models\Utilisateur;
use App\Models\Region;
use App\Models\Langue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ContenuSeeder extends Seeder
{
    public function run(): void
    {
        // Types de contenu (sans champs non sûrs)
        $typeArticle = TypeContenu::firstOrCreate(['nom_contenu' => 'article']);
        $typeVideo   = TypeContenu::firstOrCreate(['nom_contenu' => 'video']);
        $typePodcast = TypeContenu::firstOrCreate(['nom_contenu' => 'podcast']);
        $typeInterview = TypeContenu::firstOrCreate(['nom_contenu' => 'interview']);

        // Auteur (Utilisateur)
        $auteur = Utilisateur::firstOrCreate(
            ['email' => 'admin@culturebenin.bj'],
            [
                'nom' => 'Admin',
                'prenom' => 'Super',
                'mot_de_passe' => bcrypt('password'),
                'date_inscription' => now(),
            ]
        );

        // Région (utilise le champ tel qu'il existe dans ta table)
        $region = Region::firstOrCreate(['nom_region' => 'Cotonou']);

        // Langue (utilise le champ tel qu'il existe dans ta table)
        $langue = Langue::firstOrCreate(
            ['code_langue' => 'Fr'],
            ['nom_langue' => 'Français']
        );

        // Contenus — **REMARQUE** : pas de 'description' ni 'auteur' ajoutés ici
        $contenus = [
            [
                'titre' => 'Festival International Ouidah 2024',
                'texte' => '<h2>La célébration du Vodoun à Ouidah</h2><p>Le Festival International Ouidah...</p>',
                'date_creation' => Carbon::now()->subDays(15),
                'statut' => 'publie',
                'id_type_contenu' => $typeArticle->id,
                'id_auteur' => $auteur->id,
                'id_region' => $region->id,
                'id_langue' => $langue->id,
            ],
            [
                'titre' => 'Fête du Gaani à Nikki',
                'texte' => '<h2>La célébration ancestrale des Bariba</h2><p>La fête du Gaani...</p>',
                'date_creation' => Carbon::now()->subDays(30),
                'statut' => 'publie',
                'id_type_contenu' => $typeArticle->id,
                'id_auteur' => $auteur->id,
                'id_region' => $region->id,
                'id_langue' => $langue->id,
            ],
            [
                'titre' => 'Les Rois du Dahomey : Histoire et Héritage',
                'texte' => '<div class="video-player"><video controls><source src="/videos/rois-dahomey.mp4" type="video/mp4"></video></div>',
                'date_creation' => Carbon::now()->subDays(20),
                'statut' => 'publie',
                'id_type_contenu' => $typeVideo->id,
                'id_auteur' => $auteur->id,
                'id_region' => $region->id,
                'id_langue' => $langue->id,
            ],
            [
                'titre' => 'Vodoun : Mythes et Réalités',
                'texte' => '<div class="audio-player"><audio controls><source src="/podcasts/vodoun.mp3" type="audio/mpeg"></audio></div>',
                'date_creation' => Carbon::now()->subDays(50),
                'statut' => 'publie',
                'id_type_contenu' => $typePodcast->id,
                'id_auteur' => $auteur->id,
                'id_region' => $region->id,
                'id_langue' => $langue->id,
            ],
            // tu peux ajouter d'autres items ici de la même façon
        ];

        // Images associées (chemins relatifs dans public/)
        $images = [
            'adminlte/img/vodunday.jpg',
            'adminlte/img/gaani.jpg',
            'adminlte/img/abomey.jpg',
            'adminlte/img/roi.jpg',
            'adminlte/img/ballet.jpg',
        ];

        $i = 0;
        foreach ($contenus as $data) {
            $contenu = Contenu::create($data);

            // créer le média associé (assignation manuelle pour éviter mass assignment si id_contenu n'est pas fillable)
            if ($i < count($images)) {
                $media = new Media();
                $media->chemin = $images[$i];
                $media->id_type_media = 1; // adapte si nécessaire
                $media->taille = '1024x768';
                // si ta table medias a une colonne id_contenu l'ajouter manuellement :
                if (\Schema::hasColumn('medias', 'id_contenu')) {
                    $media->id_contenu = $contenu->id;
                } elseif (\Schema::hasColumn('medias', 'id_contenu')) {
                    $media->id_contenu = $contenu->id;
                }
                $media->save();
                $i++;
            }
        }

        $this->command->info(count($contenus) . ' contenus ont été créés avec succès!');
    }
}
