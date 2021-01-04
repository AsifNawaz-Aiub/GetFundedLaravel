<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateEventRequest extends FormRequest
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
            'eventName' => 'required|min:3',
            'description' => 'required|min:3',
            'goalAmount' => 'required|numeric',
            'goalDate' => 'required|date',
        ];
    }

    public function messages(){
        return [
            'eventName.required'=> "Event name is required",
            'eventName.min'=> "Event name can't be less than 3 characters",
            'description.required'=> "Description is required",
            'description.min'=> "Description can't be less than 3 characters",
            'goalAmount.required'=> "Goal amount is required",
            'goalAmount.numeric'=> "Goal amount must be a number",
            'goalDate.required'=> "Goal date is required",
            'goalDate.date'=> "Goal amount must be a date",
        ];
    }
}
