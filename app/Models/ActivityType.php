<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    use HasFactory;

    // O tipo tem muitas atividades
    public function activities() {
        return $this->hasMany('App\Models\Activity');
    }
}
