<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\BelongsToGym;

class Member extends Model
{
    use HasFactory, BelongsToGym;

    protected $fillable = [
        'gym_id',
        'name',
        'email',
        'phone',
        'address',
        'membership_package',
        'start_date',
        'end_date',
        'status'
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    public function isActive()
    {
        return now()->lte($this->end_date) && $this->status === 'active';
    }

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
