<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revue extends Model
{
    protected $table = 'revues';
    protected $fillable = [
        'title',
        'author',
        'DOI',
        'id_user',
    ];

    // Définissez les règles de validation des attributs de date, si nécessaire
    protected $casts = [
        'pdf_link' => 'string',
    ];
}
