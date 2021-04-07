<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductInventoryRequest;
use App\Models\Product;
use App\Models\ProductInventory as Inventory;

use App\Helpers\AdminResponse;

class ProductInventoryController extends Controller
{
    use AdminResponse;
    public $page = 'product';

    public function edit(Product $product)
    {
        $product->load('inventories');
        $product->load('media');

        $inventory = $product->inventories()->first();
        $page = $this->page;
        $tab = 'inventory';
        return view('admin.products.form', compact(['product', 'inventory', 'page', 'tab']));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductInventoryRequest $request)
    {
        $route = route('admin.product.inventory.edit', ['product' => $request->product_id]);
        $product = Product::find($request->product_id);
        $inventory = new Inventory($request->prepared());

        // // TODO session flashing of status on front end
        if (! $product->inventories()->save($inventory)) {
            return $this->setResponse(
                'add',
                false,
                $route,
                'Failed to create product inventory!');
        }

        return $this->setResponse(
            'add',
            true,
            $route,
            'Failed to create product inventory!');
    }

    public function update(ProductInventoryRequest $request)
    {
        $route = route('admin.product.inventory.edit', ['product' => $request->product_id]);

        $inventory = Inventory::find($request->product_inventory_id);
        $inventory->fill($request->prepared());

        // // TODO session flashing of status on front end
        if (! $inventory->save()) {
            return $this->setResponse(
                'update',
                false,
                $route,
                'Failed to update product inventory!');
        }

        return $this->setResponse(
            'update',
            true,
            $route,
            'Failed to update product inventory!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
