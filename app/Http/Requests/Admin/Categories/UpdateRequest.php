<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|min:3|max:128|unique:categories,title,'. $this->request->get('category_id') .'',
            'slug' => 'required|min:3|max:128|unique:categories,slug,'. $this->request->get('category_id') .'',
        ];
    }
}
