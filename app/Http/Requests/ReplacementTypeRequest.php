<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplacementTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:200'],
            'keterangan' => ['nullable', 'string', 'max:200'],
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Field -NAMA- tidak boleh kosong.',
        ];
    }
}
