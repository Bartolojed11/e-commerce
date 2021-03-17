<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Admin\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductDataController extends SearchController
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
        $header = [
            'header' => [
                'product id', 'name', 'price', 'actions'
            ],
            'columns' => [
                'product_id', 'name', 'price', 'actions'
            ]
        ];
        $header = json_encode($header);
        return $header;
    }
}
