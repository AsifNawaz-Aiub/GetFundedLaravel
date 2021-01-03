<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signupRequest extends FormRequest
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
            'name' => 'required|min:3',
            'username' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:3'
        ];
    }

    public function messages(){
        return [
            'name.required'=> "Full name is required",
            'name.min'=> "Full name can't be less than 3 characters",
            'username.required'=> "Username is required",
            'username.min'=> "Username can't be less than 3 characters",
            'email.email' => 'Not a valid email address',
            'password.confirmed'=> "Passwords do not match",
        ];
    }
}
