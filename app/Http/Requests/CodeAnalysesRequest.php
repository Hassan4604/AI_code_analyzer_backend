<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CodeAnalysesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => ['required', 'string'],
            'language' => ['required', 'string', 'max:50'],
        ];
    }
}
