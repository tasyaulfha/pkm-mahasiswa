<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UsulanRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required|max:50',
            'nim' => 'required|integer',
            'no_hp'=> 'required|integer' ,
            'nidn_dosen' => 'required|integer max:20',
            'judul_usulan' => 'required|',
            'skema_usulan'=>'required',
            'abstrak '=> 'required|max:255',
            'url_usulan'=> 'required|url'
        ];
    }
}
