<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class StartDateTimeException extends Exception
{
    /**
     * Retorna uma JsonResponse com success false e a mensagem de erro
     */
    public function render(): JsonResponse 
    {
        return response()
        ->json(
            [
                'success' => false,
                'message' => "Data/hora de inicio deve ser maior que Data/hora final"
            ]
        );
    }
}
