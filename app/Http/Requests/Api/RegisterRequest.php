<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'user_name' => 'required|max:255' ,
            'email' => ['required' , 'max:255' , Rule::unique('users' , 'email')],
            'password' => 'required|confirmed|min:6',
            'gender' => ['required' , Rule::in('MALE' , 'FEMALE')],
            'age' => 'required',
            'phone_number' => 'required',
        ];
    }
}
