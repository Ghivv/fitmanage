<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GymClass extends Model
{
    use HasFactory;

    protected $fillable = [
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

}
