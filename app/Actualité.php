<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actualité extends Model
{

    protected $fillable = [
        'title',
        'content',
        'image', // Ajouter le champ image
    ];
}
