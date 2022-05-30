<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOfferRequest extends FormRequest
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
            'name' => 'string|required|min:3',
            'description' => 'string|nullable',
            'propositions' => 'string|required',
            'price' => 'integer|required',
            'currency' => 'integer|required',
            'status' => 'required|string'
        ];
    }
}
