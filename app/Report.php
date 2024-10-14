<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'rapports';
    protected $fillable = [
        'title',
        'author',
        'DOI',
        'id_user',
        'status',

    ];
}
