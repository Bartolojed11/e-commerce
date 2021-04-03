<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Controllers\Admin\SearchController;
use App\Helpers\AdminDTableResponse;
use App\Helpers\AdminResponse;

class OrderController extends SearchController
{

    use AdminDTableResponse, AdminResponse;

    public $page = 'order';

    public $module = '';
    public $header = [
        'Order Id',
        'Reference No',
        'Date Ordered',
        'Status',
        'Actions'
    ];

    public $columns = [
        'order_id',
        'reference_no',
        'created_at',
        'status.name',
        'actions',
    ];

    public $actions = [
        'view' => 'show',
        'edit' => 'edit',
        'delete' => 'destroy'
    ];

    public function __construct()
    {
        $this->module = new Order;
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

        $key = json_encode($this->module->getKeyName());
            
        return view('admin.orders.index', compact(['page', 'fields', 'key']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function show(Order $order)
    {
        dd($order);
        return view('admin.order.view', compact($order));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
