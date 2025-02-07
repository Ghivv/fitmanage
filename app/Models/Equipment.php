<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\GymScope;

class Equipment extends Model
{
    use HasFactory, GymScope;

    protected $fillable = [
        'gym_id',
        'name',
        'quantity',
        'last_maintenance_date',
        'next_maintenance_date'
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
