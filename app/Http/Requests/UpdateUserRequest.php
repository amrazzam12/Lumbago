<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|max:255',
            'user_name' => 'required|max:255',
            'email' => ['required' , 'email' , Rule::unique('users' , 'email')->ignore($this->id)],
            'age' => 'required:gt:0',
            'phone_number' => ['required' , Rule::unique('users' , 'phone_number')->ignore($this->id)],
            'gender' => ['required' , Rule::in(['MALE' , 'FEMALE'])],
            'image' => 'nullable:mimes:jpg,jpeg,png,svg,gif'
        ];
    }
}
