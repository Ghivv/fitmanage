<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\GymScope;

class GymClass extends Model
{
    use HasFactory, GymScope;

    protected $fillable = [
        'gym_id',
        'name',
        'description',
        'instructor_id',
        'capacity'
    ];

    // Relasi: Banyak Class diajar oleh satu Instructor
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    // Relasi: Banyak Class diikuti oleh banyak Member (Many-to-Many melalui Attendance)
    public function members()
    {
        return $this->belongsToMany(Member::class, 'attendances');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'gymclass_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'gym_class_id');
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

}
