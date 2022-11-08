<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // harus login dulu
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
         'name' => 'required|min:3',
            'gender' => 'required', //nullable yang boleh tidak diisi
            'address' => 'required',
            'email' => 'required|email'
        ];
    }
}
