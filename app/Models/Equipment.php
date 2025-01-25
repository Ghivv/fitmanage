<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'last_maintenance_date',
        'next_maintenance_date'
    ];
}
