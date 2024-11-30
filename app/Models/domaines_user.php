<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domaines_user extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'domaine_id',
        'certification',
        'profile',
        'availability',
        'professional_experience',
        'photo',
        'tel',
        'adresse'
    ]; // Attributs mass assignables

    // Définir la relation avec le modèle Domaine
    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }

    // Définir la relation avec le modèle User (si vous avez un modèle User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
