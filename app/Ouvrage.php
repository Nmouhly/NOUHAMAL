<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ouvrage extends Model
{
    protected $table = 'ouvrages';
    protected $fillable = [
        'title',
        'author',
        'DOI',
        'id_user',
        'status',


    ];
    // public function member()
    // {
    //     return $this->belongsTo(Member::class, 'id_user', 'user_id');
    // }

}

