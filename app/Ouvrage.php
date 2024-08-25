<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ouvrage extends Model
{
    protected $table = 'ouvrages';
    protected $fillable = [
        'title',
        'author',
        'pdf_link',
        //'id_user',
    ];
    // public function member()
    // {
    //     return $this->belongsTo(Member::class, 'id_user', 'user_id');
    // }
}

