<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\rendivent;
use App\Models\Domaine;
use App\Models\Availability;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'role',
        'phone',
        'specialty',
        'availability',
        'image',
        'nb_experience',
        'domaine_id',
    ];
   
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'availability' => 'boolean',
    ];

public function domaine()
    {
        return $this->belongsTo(Domaine::class); // Un expert appartient à un domaine
    }

public function rendivents()
{
    return $this->hasMany(Rendivent::class);
}
public function availabilities()
    {
        return $this->hasMany(Availability::class); // Un utilisateur peut avoir plusieurs disponibilités
    }

}
