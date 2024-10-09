<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLaporanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'judul'             => 'required',
            'tanggal_kegiatan'  => 'required',
            'deskripsi'         => 'required',
            'status'            => 'required',
            'cabang_id'         => 'required',
            'img'               => 'nullable|image|file|mimes:jpg,png,jpeg,webp|max:3024',
            'visibility'        => 'required',
        ];
    }
}
