<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExerciseRequest extends FormRequest
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
            'description' => 'required',
            'focus_areas'=>'required',
            'duration_in_minutes'=>'required',
            'video_link'=>'required',
            'category_id'=>'required',
            'icon' => 'nullable:mimes:jpg,jpeg,png,svg,gif'

        ];
    }
}
