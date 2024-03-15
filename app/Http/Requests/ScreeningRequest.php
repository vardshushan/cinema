<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScreeningRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'room' => ['required', 'integer',],
            'movie' => ['required', 'integer'],
            'start_time' => ['required'],
        ];
    }
}
