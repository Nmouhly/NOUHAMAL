<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'team',
        'start_date',
        'end_date',
        'funding_type',
        'status'
    ];
}
