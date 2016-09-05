<?php

namespace app\Http\Requests\Postcards;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostcard extends FormRequest
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
            'city' => 'required',
            'country' => 'required',
            'username' => 'required',
            'path' => 'required|image|mimes:jpeg,png',
        ];
    }
}
