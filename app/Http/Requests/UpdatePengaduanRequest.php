<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePengaduanRequest extends FormRequest
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
            'id' => 'required', 
            'description'=> 'required', 
            'image'=> 'required', 
            'status'=> 'required', 
            'user_id'=> 'required',
            'tingkatan_id'=> 'required',
            'bidang_id'=> 'required'
        ];
    }
}
