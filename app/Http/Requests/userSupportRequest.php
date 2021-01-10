<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userSupportRequest extends FormRequest
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
            'amount' => 'required',
            'donationMessage' => 'required|min:3'
        ];
    }

    public function messages(){
        return [
            'amount.required'=> "can't left empty....",
            'donationMessage.required'=> "can't left empty...."        
        ];
    }
}
