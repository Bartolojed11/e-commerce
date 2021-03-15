<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductDataController extends Controller
{
    protected function setActions($data)
    {   
        return $data->each(function ($item) {
            $item->actions = [
                'view' => route('admin.product.show', ['product' => $item->product_id]),
                'edit' => route('admin.product.edit', ['product' => $item->product_id]),
                'delete' => route('admin.product.destroy', ['product' => $item->product_id]),
            ];
        })->pluck(['actions']);
    }

    protected function setFields()
    {
        return [
            'header' => [
                'product_id', 'name', 'price', 'actions'
            ]
        ];
    }
}
