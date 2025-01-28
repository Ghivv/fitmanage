<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'membership_package',
        'start_date',
        'end_date',
        'status'
    ];

    // Relasi: Satu Member memiliki banyak Payment
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // Relasi: Banyak Member mengikuti banyak Class (Many-to-Many melalui Attendance)
    public function classes()
    {
        return $this->belongsToMany(GymClass::class, 'attendances');
    }

    // Relasi: Satu Member memiliki satu User
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
