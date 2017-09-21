<?php

namespace App\Http\Requests\Api;

use Dingo\Api\Http\FormRequest as DingoFormRequest;

class FormRequest extends DingoFormRequest
{
    public function authorize()
    {
        return true;
    }
}
