<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  ArtikelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title'=> 'required',
            'slug'=> 'required',
            'tags'=> 'required',
            'img_artikel'=> 'required',
            'artikel'=>  'required',
        ];
    }

    public function messages(): array
    {
        return[
            'title.required'=>'Silahkan Masukkan Judul Untuk Artikel Anda',
            'tags.required'=>'Silahkan Masukkan Tags Untuk Artikel Anda',
            'img_artikel.required'=>'Silahkan Masukkan Image Untuk Artikel Anda',
            'artikel.required'=>'Silahkan Masukkan Isi Artikel Untuk Artikel Anda'
        ];
    }
}
