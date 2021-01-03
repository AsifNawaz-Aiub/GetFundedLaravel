<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateUserRequest extends FormRequest
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
            'userName' => 'required|min:3',
            'email' => 'required|email',
        ];
    }

    public function messages(){
        return [
            'name.required'=> "Full name is required",
            'name.min'=> "Full name can't be less than 3 characters",
            'userName.required'=> "Username is required",
            'userName.min'=> "Username can't be less than 3 characters",
            'email.email' => 'Not a valid email address',
        ];
    }
}
