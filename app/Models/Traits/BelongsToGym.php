<?php

namespace App\Models\Traits;

use App\Models\Gym;
use Illuminate\Support\Facades\Auth;

trait BelongsToGym
{
    protected static function bootBelongsToGym()
    {
        // static::addGlobalScope(new GymScope);

        static::creating(function ($model) {
            if (!$model->gym_id && Auth::check() && Auth::user()->role !== 'super_admin') {
                $model->gym_id = Auth::user()->gym_id;
            }
        });

    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
