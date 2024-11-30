<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experts extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'image',
        'specialty',
        'availability',
        'nb_experience',
        'domaine_id', // Clé étrangère vers le domaine
    ];

    public function domaine()
    {
        return $this->belongsTo(Domaine::class); // Un expert appartient à un domaine
    }
}
