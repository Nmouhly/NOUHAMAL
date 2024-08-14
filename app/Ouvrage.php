<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ouvrage extends Model
{
    protected $fillable = [
        'title',
        'author',
        'pdf_link',
    ];
}
