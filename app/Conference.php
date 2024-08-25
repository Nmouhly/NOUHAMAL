<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $table = 'conferences';
    protected $fillable = [
        'title',
        'authors',
        'paper_title',
        'conference_name',
        'date',
        'location',
        'reference',
        'image',
    ];

}
