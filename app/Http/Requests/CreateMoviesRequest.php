<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateMoviesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required',  'max:255', Rule::unique('movies')->ignore(null, 'id') ],
            'duration' => ['required', 'integer', 'min:1'],
            'poster' => ['required', 'image|mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }
}
