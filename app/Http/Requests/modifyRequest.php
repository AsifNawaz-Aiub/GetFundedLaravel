<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class modifyRequest extends FormRequest
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
            'eventName' => 'required',
            'description' => 'required',
            'categoryId' => 'required',
            'goalAmount' => 'required',
           
        ];
    }

    public function messages(){
        return [
            'eventName.required' => "Event Name can't left empty",
            'description.required' => "Description can't left empty",
            'categoryId.required'=> "Category Id can't left empty",
            'goalAmount.required'=> "Goal Amount can't left empty"
        ];
    }
}
