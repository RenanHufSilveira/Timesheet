<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\StartDateTimeException;

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

    // Validar se data inicial é menor que a data final
    public function timeValidation(int $started, ?int $finished) :bool
    {
        if (!empty($finished) && $started > $finished) {
            throw new StartDateTimeException();
        }
        return true;
    }
}
