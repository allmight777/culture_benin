<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Langue extends Model
{
   protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nom_langue',
        'code_langue',
        'description',
    ];

     // Relations
    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'id_langue');
    }

}
