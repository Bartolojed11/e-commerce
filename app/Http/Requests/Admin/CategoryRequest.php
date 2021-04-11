<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => "required|unique:categories,permalink,$this->name,category_id",
            'permalink' => "required|unique:categories,permalink,$this->permalink,category_id",
        ];
    }

    public function prepared()
    {
        return [
            "name" => $this->name,
            "permalink" => $this->permalink,
            "parent_id" => $this->parent_id ?? 0
        ];
    }
}
