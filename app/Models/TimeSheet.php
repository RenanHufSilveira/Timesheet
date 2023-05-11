<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    use HasFactory;

    // O apontamento tem muitos itens
    public function timesheetitems() {
        return $this->hasMany('App\Models\TimeSheetItem');
    }
}
