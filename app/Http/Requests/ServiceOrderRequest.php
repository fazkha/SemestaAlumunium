<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'branch_id' => ['required', 'exists:branches,id'],
            'customer_id' => ['required', 'exists:customers,id'],
            'jenis_pelayanan_id' => ['required', 'exists:jenis_pelayanans,id'],
            'tanggal' => ['required', 'date'],
            'no_order' => ['nullable', 'string', 'max:200'],
        ];
    }
}
