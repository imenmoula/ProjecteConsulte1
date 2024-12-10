<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\users;

class Availability extends Model
{
    use HasFactory;

    protected $table = 'availabilities';
    protected $fillable = [
        'user_id', 'start_time', 'end_time', 'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
