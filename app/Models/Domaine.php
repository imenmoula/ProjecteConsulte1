<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    use HasFactory;
    
   
    protected $fillable = ['name', 'description', 'image']; 

    public function domaineUsers()
    {
        return $this->hasMany(DomaineUser::class);
    }


}