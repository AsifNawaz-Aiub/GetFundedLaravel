<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
     public function rules(){
        return [
            'eventName'    => 'required',
            'description'  => 'required',
            'categoryId'   => 'required',
            'goalAmount'   => 'required',
            'goalDate'     => 'required',
           
        ];
    }

    public function messages(){
        return [
            'eventName.required'   => "..............................................       event name can't left empty....",
            'description.required' => "..............................................       description can't left empty....",
            'categoryId.required'  => "..............................................       category id can't left empty....",
            'goalAmount.required'  => "..............................................       goal amount can't left empty....",
            'goalDate.required'    => "..............................................       goal date can't left empty....",
           

        ];
    }
}
