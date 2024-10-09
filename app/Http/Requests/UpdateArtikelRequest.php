<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArtikelRequest extends FormRequest
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
            'kategori_id'       => 'required',
            'judul'             => 'required',
            'deskripsi'         => 'required',
            'img'               => 'nullable|image|file|mimes:jpg,png,jpeg,webp|max:3024',
            'status'            => 'required',
            'tanggal_publish'   => 'required'
        ];
    }
}
