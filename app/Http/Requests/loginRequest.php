<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'uid' => 'required|min:3',
            'password' => 'required',
        ];
    }

    public function messages(){
        return [
            'uid.required'=> "Username or email is required",
            'uid.min'=> "Username or email can't be less than 3 characters",
        ];
    }
}
