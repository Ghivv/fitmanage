<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\GymScope;

class Attendance extends Model
{
    use HasFactory, GymScope;

    protected $fillable = [
        'gym_id',
        'member_id',
        'gymclass_id',
        'check_in',
        'check_out'
    ];

    // Relasi: Satu Attendance dimiliki oleh satu Member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    // Relasi: Satu Attendance dimiliki oleh satu Class
    public function gymclass()
    {
        return $this->belongsTo(GymClass::class);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
