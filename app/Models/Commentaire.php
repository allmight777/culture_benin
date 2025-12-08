<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $table = 'commentaires';

    protected $fillable = [
        'texte',
        'note',
        'id_utilisateur',
        'id_contenu',
        'date', // optionnel
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    // Relation vers l'utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }

    // Relation vers le contenu
    public function contenu()
    {
        return $this->belongsTo(Contenu::class, 'id_contenu');
    }
}
