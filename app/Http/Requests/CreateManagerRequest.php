<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateManagerRequest extends FormRequest
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
            'last_name' => 'string|required|min:3',
            'first_name' => 'string|required|min:3',
            'middle_name' => 'string|nullable',
            'gender' => 'string|required',
            'phone' => 'string|nullable',
            'email' => 'email|required',
            'country' => 'integer|nullable',
            'province' => 'integer|nullable',
            'city' => 'integer|nullable',
            'township' => 'integer|nullable',
            'street' => 'integer|nullable',
            'address' => 'string|nullable',
            'type' => 'integer|nullable'
        ];
    }
}
