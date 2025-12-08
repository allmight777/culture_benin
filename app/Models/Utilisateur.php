<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Utilisateur extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'utilisateurs';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'mot_de_passe',
        'sexe',
        'date_inscription',
        'date_naissance',
        'statut',
        'photo',
        'id_role',
        'id_langue',
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    protected $casts = [
        'date_naissance' => 'date',
    ];

    /**
     * Mutator : hashe le mot de passe automatiquement si besoin.
     * Evite de re-hasher une valeur déjà hachée (test basique).
     */
    public function setMotDePasseAttribute($value)
    {
        if (empty($value)) return;
        // Si la valeur semble déjà être un bcrypt (commence par $2y$ ou $2a$), on la laisse
        if (Str::startsWith($value, ['$2y$', '$2a$'])) {
            $this->attributes['mot_de_passe'] = $value;
        } else {
            $this->attributes['mot_de_passe'] = bcrypt($value);
        }
    }

    /**
     * Indique à Laravel quelle colonne utiliser pour l'authentification.
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    // Relations
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class, 'id_langue');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_utilisateur');
    }
}
