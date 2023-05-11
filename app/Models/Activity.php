<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    // A atividade tem um tipo
    public function activitytype()
    {
        return $this->belongsTo('App\Models\ActivityType');
    }
}
