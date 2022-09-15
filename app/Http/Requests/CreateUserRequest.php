<?php

namespace App\Http\Requests;

class CreateUserRequest extends FormRequest
{
    protected function afterValidationPasses()
    {
        $this->forget('confirm_password');
        $this->password = sha1($this->password);
    }

    /**
     * Add Request Validation Rules
     * See: https://laravel.com/docs/7.x/validation#available-validation-rules
     */
    public function rules()
    {
        return [
            'email' => 'unique:users,email|email|required',
            'password' => 'required_with:confirm_password|same:confirm_password|min:5',
            'confirm_password' => 'string|required',
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
            'password.same' => ':attribute does not match :same',
            'password.required_with' => ':attribute needs :required_with to properly validate',
            'email.unique' => ':attribute already exists',
            'email.email' => ':attribute must be an email',
            'email.required' => ':attribute is required',
            'confirm_password.required' => ':attribute is required',
            'first_name.required' => ':attribute is required',
            'last_name.required' => ':attribute is required',
            'first_name.string' => ':attribute must be a string',
            'last_name.string' => ':attribute must be a string',
            'confirm_password.string' => ':attribute must be a string'
        ];
    }


}
