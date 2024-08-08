<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // Inclure 'statut' dans les attributs assignables en masse
    protected $fillable = ['name', 'position', 'team_id', 'bio', 'contact_info', 'statut'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
