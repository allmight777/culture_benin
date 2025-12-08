<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenu extends Model
{
    use HasFactory;

    protected $table = 'contenus';

    protected $fillable = [
        'titre',
        'texte',
        'date_creation',
        'statut',
        'description',
        'id_type_contenu',
        'id_auteur',
        'id_parent',
        'id_region',
        'id_langue',
        'id_moderateur',
        'auteur', // optionnel selon ta migration
        'date_validation', // optionnel
    ];

    protected $casts = [
        'date_validation' => 'datetime',
    ];

     public function type_contenus()
    {
        return $this->belongsTo(TypeContenu::class, 'id_type_contenu');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_contenu');
    }

    public function medias()
    {
        return $this->hasMany(Media::class, 'id_contenu');
    }

    // App\Models\Contenu.php
    public function utilisateur() {
        return $this->belongsTo(Utilisateur::class, 'id_auteur');
    }


    public function region() {
        return $this->belongsTo(Region::class, 'id_region');
    }

    public function langue() {
        return $this->belongsTo(Langue::class, 'id_langue');
    }

    public function typecontenu() {
        return $this->belongsTo(TypeContenu::class, 'id_type_contenu');
    }


}