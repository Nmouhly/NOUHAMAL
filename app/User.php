<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Member; // Ensure this is the correct namespace

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'bio',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => 'integer',
    ];

    public function member()
    {
        return $this->hasOne(Member::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($user) {
            if ($user->member) {
                $user->member->update([
                    'email' => $user->email,
                    'name' => $user->name,
                ]);
            }
        });
    }
}
