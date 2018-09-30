<?php
/**
 * Created by PhpStorm.
 * User: aden
 * Date: 29.09.2018
 * Time: 20:05
 */

namespace App\Http\Requests;

class UserUpdateRequest extends ApiRequest
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
            'email' => 'required|email|max:128|unique:users,email,'.$this->user,
            'password' => 'required|min:8|max:32|',
            'company' => 'nullable|integer|exists:companies,id'
        ];
    }
}