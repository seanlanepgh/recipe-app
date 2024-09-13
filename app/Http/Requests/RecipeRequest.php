<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            "thumbnail" => 'required|url',
            "description" => 'required|max:1000',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max'  => 'The max length of name field is 255.',
            'thumbnail.required' => 'The thumbnail field is required.',
            'thumbnail.url'  => 'The thumbnail field must be a valid URL.',
            'description.required' => 'The description field is required.',
            'description.max'  => 'The max length of description field is 255.',
        ];
    }
}
