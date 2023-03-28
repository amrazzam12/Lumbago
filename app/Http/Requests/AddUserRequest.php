<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddUserRequest extends FormRequest
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
            'email' => ['required' , 'email' , Rule::unique('users' , 'email')],
            'password' => 'required',
            'age' => 'required:gt:0',
            'phone_number' => ['required' , Rule::unique('users' , 'phone_number')],
            'gender' => ['required' , Rule::in(['MALE' , 'FEMALE'])],
            'image' => 'nullable:mimes:jpg,jpeg,png,svg,gif'

        ];
    }
}
