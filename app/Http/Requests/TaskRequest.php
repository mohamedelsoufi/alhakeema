<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required_without:id|unique:tasks,title,' . $this->id,
            'description' => 'required',
            'user_id' => 'required|exists:users,id'
        ];
    }
}
