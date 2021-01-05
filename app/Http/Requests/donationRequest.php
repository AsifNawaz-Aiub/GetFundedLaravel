<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class donationRequest extends FormRequest
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
            'amount' => 'required|numeric',
            'message' => 'required'
        ];
    }

    public function messages(){
        return [
            'amount.required'=> "Amount is required",
            'amount.numeric'=> "Amount must be a number",
            'message.required'=> "Message is required",
        ];
    }
}
