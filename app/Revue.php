<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revue extends Model
{
    protected $fillable = [
        'title',
        'author',
        'pdf_link',
    ];

    // Définissez les règles de validation des attributs de date, si nécessaire
    protected $casts = [
        'pdf_link' => 'string',
    ];
}
