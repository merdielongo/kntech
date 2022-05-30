<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'last_name' => 'string|nullable|min:3',
            'middle_name' => 'string|nullable|min:3',
            'first_name' => 'string|nullable|min:3',
            'gender' => 'string|required',
            'phone' => 'string|nullable',
            'email' => 'string|email|required|unique:users',
            'password' => 'min:8|confirmed|string|required'
        ];
    }
}
