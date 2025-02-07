<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gym extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'kota',
        'nomor_telepon',
        'email',
        'website',
        'logo',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function equipment()
    {
        return $this->hasMany(Equipment::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function instructors()
    {
        return $this->hasMany(Instructor::class);
    }

    public function classes()
    {
        return $this->hasMany(GymClass::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
