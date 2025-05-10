<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    /** @use HasFactory<\Database\Factories\GymFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'city',
        'phone',
        'email',
        'working_hours_start',
        'working_hours_end',
        'status',
        'setup_complete',
        'logo',
        'trial_started_at',
        'trial_ends_at',
        'activated_at',
    ];
}
