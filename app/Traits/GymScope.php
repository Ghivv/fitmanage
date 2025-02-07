<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait GymScope
{
    protected static function bootGymScope()
    {
        static::addGlobalScope('gym', function (Builder $builder) {
            if (Auth::check() && Auth::user()->gym_id) {
                $builder->where('gym_id', Auth::user()->gym_id);
            }
        });
    }
}
