<?php

namespace App\Http\Requests;
use App\Listeners\FlashSuccessMessage;

class UpdateUserRequest extends FormRequest
{


    /**
     * Add Request Validation Rules
     * See: https://laravel.com/docs/7.x/validation#available-validation-rules
     */
    public function rules()
    {
        return [
            'email' => "required|email|unique:users,email,$this->id,id",
            'first_name' => 'string|required',
            'last_name' => 'string|required'
        ];
    }

    /**
     * Add Custom Request Validation Messages When Validation Fails
     * See: base_path('languages/en/validation.php') file
     */
    public function messages()
    {
        return [
            'email.unique' => ':attribute already exists',
            'email.email' => ':attribute must be an email',
            'email.required' => ':attribute is required',
            'first_name.required' => ':attribute is required',
            'last_name.required' => ':attribute is required',
            'first_name.string' => ':attribute must be a string',
            'last_name.string' => ':attribute must be a string',
        ];
    }


}
