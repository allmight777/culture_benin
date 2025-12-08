<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Media;

class MediaSeeder extends Seeder
{
    public function run()
    {
        $medias = [

            [
                'chemin' => 'adminlte/img/atacora.jpg',
                'taille' => 1800,
                'id_type_media' => 1,
                'description' => 'Département de l’Atacora',
            ],
            [
                'chemin' => 'adminlte/img/ouidah1.jpg',
                'taille' => 1800,
                'id_type_media' => 1,
                'description' => 'Région Sud Maritime : Ouidah, Grand-Popo',
            ],
            [
                'chemin' => 'adminlte/img/plat.jpg',
                'taille' => 1800,
                'id_type_media' => 1,
                'description' => 'Région des Plateaux : Abomey, Kétou',
            ],
            [
                'chemin' => 'adminlte/img/nord.jpg',
                'taille' => 1800,
                'id_type_media' => 1,
                'description' => 'Nord Bénin : Parakou, Nikki',
            ],
            [
                'chemin' => 'adminlte/img/atacora_chain.jpg',
                'taille' => 1800,
                'id_type_media' => 1,
                'description' => 'Chaîne de l’Atacora',
            ],
            [
                'chemin' => 'adminlte/img/niger.jpg',
                'taille' => 1800,
                'id_type_media' => 1,
                'description' => 'Vallée du Niger : Malanville, Karimama',
            ],
            [
                'chemin' => 'adminlte/img/lagune.jpg',
                'taille' => 1800,
                'id_type_media' => 1,
                'description' => 'Région des Lacs : Lagunes, Pêche',
            ],
        ];

        foreach ($medias as $media) {
            Media::create($media);
        }

        echo "Medias insérés avec succès !\n";
    }
}
