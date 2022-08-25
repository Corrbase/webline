<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'oldPassword' => [
                'nullable',
                'required_if:password,*',
                'min:3',
                'max:100',
            ],
            'password' => [
                'nullable',
                'required_if:oldPassword,*',
                'min:3',
                'max:100',
            ],
        ];
    }
}
