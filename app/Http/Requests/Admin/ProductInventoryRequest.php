<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductInventoryRequest extends FormRequest
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
            'product_id' => 'required',
            'quantity' => 'numeric',
            'low_stock' => 'numeric'
        ];
    }

    public function prepared()
    {
        return [
            'product_id' => $this->product_id ?? 0,
            'quantity' => $this->quantity ?? 0,
            'low_stock' => $this->low_stock ?? 0,
            'track_inventory' => $this->track_inventory ?? true,
            'active' => $this->active ?? true,
        ];
    }
}
