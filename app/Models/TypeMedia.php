<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMedia extends Model
{
    use HasFactory;

    protected $table = 'type_medias';

    protected $fillable = [
        'nom_media',
        'description', // optionnel
    ];

    public function medias()
    {
        return $this->hasMany(Media::class, 'id_type_media');
    }

}

