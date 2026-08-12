<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengaduanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'branch_id' => ['required', 'exists:branches,id'],
            'user_id' => ['required', 'exists:users,id'],
            'aduan' => ['required', 'string', 'max:200'],
            'lokasi' => ['nullable', 'string', 'max:200'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,jpg', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'aduan.required' => 'Field -ADUAN- tidak boleh kosong.',
        ];
    }
}
