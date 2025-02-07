<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\GymScope;

class Payment extends Model
{
    use HasFactory, GymScope;

    protected $fillable = [
        'gym_id',
        'member_id',
        'amount',
        'payment_date',
        'status'
    ];

    // Relasi: Satu Payment dimiliki oleh satu Member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
