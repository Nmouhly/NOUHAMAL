<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilitation extends Model
{
    protected $table = 'habilitations';

    // Attributs remplissables
    protected $fillable = [
        'title',
        'author',
        'doi',
        'id_user',
        'lieu',
        'date',
        'status',
    ];
}
