<?php
namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'bio', // Ajouté pour le champ role
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'role' => 'integer', // Ajouté pour caster role en entier
    ];

    public function member()
    {
        return $this->hasOne(Member::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($user) {
            // Update the associated member's email and name
            if ($user->member) {
                $user->member->update([
                    'email' => $user->email,
                    'name' => $user->name, // Update name in Member
                ]);
            }
        });

       
    }
}
