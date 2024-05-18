<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBootcampRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'thumbnail'=>' image|mimes:jpeg,png,jpg,gif,svg',
            'nama'=>'required',
            'kategori_id'=>'required',
            'mentor_id'=>'required',
            'harga'=>'required',
            'kuota'=>'required',
            'deskripsi'=>'required',
        ];
    }


    public function messages():array{
        return[
            'thumbnail.image'=>'thumbnail harus berupa gambar',
            'nama.required'=>'Silahkan Masukkan Nama bootcamp',
            'kategori.required'=>'Silahkan Masukkan Nama kategori',
            'mentor_id.required'=>'Silahkan Masukkan Id mentor',
            'harga.required'=>'Silahkan Masukkan Nama harga',
            'kuota.required'=>'Silahkan Masukkan Nama kuota',
            'deskripsi.required'=>'Silahkan Masukkan Nama deskripsi',
        ];
    }
}
