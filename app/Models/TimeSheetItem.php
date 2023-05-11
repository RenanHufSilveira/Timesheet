<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSheetItem extends Model
{
    use HasFactory;

    // O item do apontamento pertence a um apontamento
    public function timesheet()
    {
        return $this->belongsTo('App\Models\TimeSheet');
    }

    // O item do apontamento tem uma atividade
    public function activity()
    {
        return $this->belongsTo('App\Models\Activity');
    }
}
