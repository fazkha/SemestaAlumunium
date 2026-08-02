<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StdInspectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'urutan' => ['required', 'integer', 'min:1'],
            'standar' => ['required', 'string', 'max:200'],
        ];
    }

    public function messages()
    {
        return [
            'urutan.required' => 'Field -URUTAN- tidak boleh kosong.',
            'standar.required' => 'Field -STANDAR- tidak boleh kosong.',
        ];
    }
}
