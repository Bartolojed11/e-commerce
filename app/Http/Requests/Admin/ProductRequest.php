<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductRequest extends FormRequest
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
            'permalink' => "required|unique:products,permalink,$this->permalink,product_id",
            'name' => "required|unique:products,name,$this->name,product_id",
            'price' => 'numeric'
        ];
    }


    public function prepared()
    {
        return [
            'name' => $this->name,
            'permalink' => Str::snake($this->permalink),
            'price' => $this->price,
            'description' => $this->description ?? '',
            'keywords' => $this->keywords ?? '',
            'active' => $this->keywords ?? true
        ];
    }
}
