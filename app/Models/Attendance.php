<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'class_id',
        'check_in',
        'check_out'
    ];

    // Relasi: Satu Attendance dimiliki oleh satu Member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    // Relasi: Satu Attendance dimiliki oleh satu Class
    public function class()
    {
        return $this->belongsTo(GymClass::class);
    }
}
