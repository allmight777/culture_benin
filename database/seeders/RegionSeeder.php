<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $regions = [
            [
                'nom_region' => 'Atacora',
                'description' => 'Région montagneuse avec diversité ethnique',
                'population' => 770000,
                'superficie' => 20499,
                'localisation' => 'Nord-Ouest',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_region' => 'Sud Maritime',
                'description' => "Région côtière marquée par l'histoire de la traite négrière et le vodoun. Architecture brésilienne.",
                'population' => null,
                'superficie' => null,
                'localisation' => 'Cotonou, Ouidah, Grand-Popo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_region' => 'Région des Plateaux',
                'description' => "Cœur historique du royaume du Danhomè. Palais royaux d'Abomey classés UNESCO.",
                'population' => null,
                'superficie' => null,
                'localisation' => 'Abomey, Sakété, Kétou',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_region' => 'Nord Bénin',
                'description' => "Région des royaumes soudanais, traditions équestres et architecture en terre.",
                'population' => null,
                'superficie' => null,
                'localisation' => 'Parakou, Nikki, Natitingou',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_region' => "Chaîne de l'Atacora",
                'description' => "Région montagneuse avec l'architecture tata somba.",
                'population' => null,
                'superficie' => null,
                'localisation' => 'Natitingou, Boukoumbé',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_region' => 'Vallée du Niger',
                'description' => 'Région fluviale avec échanges transsahariens et architecture soudanaise.',
                'population' => null,
                'superficie' => null,
                'localisation' => 'Malanville, Karimama',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_region' => 'Région des Lacs',
                'description' => 'Région lagunaire avec communautés de pêcheurs et vodoun des eaux.',
                'population' => null,
                'superficie' => null,
                'localisation' => 'Agoué, Lokossa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($regions as $regionData) {
            Region::create($regionData);
        }

        $this->command->info(count($regions) . ' régions insérées avec succès.');
    }
}
