<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Langue;

class LangueSeeder extends Seeder
{
    public function run()
    {
        $langues = [
            [
                'nom_langue' => 'Français',
                'code_langue' => 'fr',
                'description' => "Langue officielle utilisée dans l'administration, l'éducation et les médias. Héritage de la période coloniale."
            ],
            [
                'nom_langue' => 'Fon',
                'code_langue' => 'fon',
                'description' => 'Parlée dans le sud du Bénin. Langue des royaumes du Danhomè et langue du Vodoun.'
            ],
            [
                'nom_langue' => 'Yoruba',
                'code_langue' => 'yor',
                'description' => 'Parlée dans le sud-est, liée à la religion Ifá. Riche tradition littéraire.'
            ],
            [
                'nom_langue' => 'Bariba',
                'code_langue' => 'bba',
                'description' => 'Langue principale du nord du Bénin, parlée par le peuple Bariba.'
            ],
            [
                'nom_langue' => 'Dendi',
                'code_langue' => 'den',
                'description' => 'Langue de commerce dans le nord, influencée par le songhaï et l\'arabe.'
            ],
            [
                'nom_langue' => 'Diversité Linguistique',
                'code_langue' => 'div',
                'description' => 'Le Bénin compte plus de 50 langues nationales, représentant une richesse culturelle exceptionnelle.'
            ],
        ];

        foreach ($langues as $langue) {
            Langue::create($langue);
        }
    }
}
