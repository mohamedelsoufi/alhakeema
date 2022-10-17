<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required_without:id|max:255',
            'email' => 'required_without:id|email|unique:users,email,'.$this->id,
            'password' => 'required_without:id|confirmed',
            'password_confirmation' => 'required_without:id|same:password',
            'is_admin' => 'boolean',
            'active' => 'boolean',
        ];
    }

}
