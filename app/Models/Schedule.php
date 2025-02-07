<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\GymScope;

class Schedule extends Model
{
    use HasFactory, GymScope;

    protected $fillable = [
        'gym_id',
        'gym_class_id',
        'schedule_time',
        'status',
    ];

    public function gymClass()
    {
        return $this->belongsTo(GymClass::class);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
