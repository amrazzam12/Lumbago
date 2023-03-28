<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddDoctorRequest extends FormRequest
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
            'email' => ['required' , 'email' , Rule::unique('doctors' , 'email')],
            'password' => 'required',
            'age' => 'required:gt:0',
            'phone_number' => ['required' , Rule::unique('doctors' , 'phone_number')],
            'years_of_experience' => 'required',
            'gender' => ['required' , Rule::in(['MALE' , 'FEMALE'])],
            'speciality_id' => ['required' , Rule::exists('specialities' , 'id')],
            'image' => 'nullable:mimes:jpg,jpeg,png,svg,gif'

        ];
    }
}
