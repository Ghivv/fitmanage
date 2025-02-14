<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_id',
        'name',
        'email',
        'phone',
        'specialization'
    ];

    // Relasi: Satu Instructor mengajar banyak Class
    public function gym_classes()
    {
        return $this->hasMany(GymClass::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
