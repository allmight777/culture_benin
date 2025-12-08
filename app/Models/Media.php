<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medias';

    protected $fillable = [
        'chemin',
        'taille',
        'id_type_media',
        'description', // optionnel
    ];

    // app/Models/Media.php
    public function type_media()
    {
        return $this->belongsTo(TypeMedia::class, 'id_type_media');
    }

}

