<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Admin\SearchController;

use App\Helpers\AdminResponse;

class ProductController extends SearchController
{

    use AdminResponse;

    public $page = 'product';
    public $module = '';
    public $header = [
        'Product Id',
        'Name',
        'Price',
        'Actions'
    ];

    public $columns = [
        'product_id',
        'name',
        'price',
        'actions',
    ];

    public $actions = [
        'view' => 'show',
        'edit' => 'edit',
        'delete' => 'destroy'
    ];

    public function __construct()
    {
        $this->module = New Product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = $this->page;

        $fields = $this->setFields();

        return view('admin.products.index', compact(['page', 'fields']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = $this->page;
        return view('admin.products.form', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load('inventories');

        $inventory = $product->inventories()->first();
        $page = $this->page;
        return view('admin.products.view', compact(['product', 'inventory', 'page']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->load('inventories');

        $inventory = $product->inventories()->first();
        $page = $this->page;
        return view('admin.products.form', compact(['product', 'inventory', 'page']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd();
    }
}
