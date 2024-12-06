<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expert;

class Domaine extends Model
{
    use HasFactory;
    
   
    protected $fillable = ['name', 'description', 'image']; 

   
    public function experts()
    {
        return $this->hasMany(Experts::class);
    }
    

}
