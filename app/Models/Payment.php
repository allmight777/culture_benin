<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments'; // ou le nom réel si différent

    // Si ta table utilise des colonnes FR différentes (ex: id_utilisateur), on les liste
    protected $fillable = [
        'id_utilisateur',
        'transaction_id',
        'type_contenu',
        'id_contenu',
        'montant',
        'status',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
        // 'montant' => 'decimal:2' // optionnel
    ];

    // Si ta colonne "id_utilisateur" référence Utilisateur :
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }
}
