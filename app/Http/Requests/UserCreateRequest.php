<?php

namespace App\Http\Requests;

class UserCreateRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:32',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:32|',
            'company' => 'nullable|integer|exists:companies,id'
        ];
    }

}
