<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;

class Domaine extends Model
{
    use HasFactory;
    
   
    protected $fillable = ['name', 'description', 'image']; 

   

    public function user()
    {
        return $this->hasMany(user::class);
    }
    

}
