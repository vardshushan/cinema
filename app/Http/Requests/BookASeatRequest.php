<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookASeatRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'seatId' => ['required', 'integer',],
            'screeningId' => ['required', 'integer'],
        ];
    }
}
