<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeContenu extends Model
{
    use HasFactory;

    protected $table = 'type_contenus';

    protected $fillable = [
        'nom_contenu',
        'description', // optionnel
    ];

     public function contenus()
    {
        return $this->hasMany(Contenu::class, 'id_type_contenu');
    }
}
