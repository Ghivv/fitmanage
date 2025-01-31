<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_class_id',
        'schedule_time',
        'status',
    ];

    public function gymClass()
    {
        return $this->belongsTo(GymClass::class);
    }
}
