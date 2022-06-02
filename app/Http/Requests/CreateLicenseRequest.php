<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLicenseRequest extends FormRequest
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
            'organization' => 'integer|required',
            'offer' => 'integer|required',
            'days' => 'integer|nullable',
            'label' => 'string|nullable',
            'expiration_at' => 'string|nullable',
            'beginning_license' => 'string|nullable',
            'end_license' => 'string|nullable',
            'status' => 'string|required',
        ];
    }
}
