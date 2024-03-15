<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255',],
            'count' => ['required', 'integer', 'min:1'],
            'row_count' => ['required', 'integer', 'min:1'],
        ];
    }
}
