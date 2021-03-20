<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Controllers\Admin\SearchController;
use App\Helpers\AdminResponse;

class AdminController extends SearchController
{

    use AdminResponse;

    public $page = 'admin';
    public $module = '';
    public $header = [
        'Admin Id',
        'Full Name',
        'Email',
        // 'Status',
        'Actions'
    ];

    public $columns = [
        'admin_id',
        'full_name',
        'email',
        // 'status.name',
        'actions',
    ];

    public $actions = [
        'view' => 'show',
        'edit' => 'edit',
        'delete' => 'destroy'
    ];

    public function __construct()
    {
        $this->module = New Admin;
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

        return view('admin.admins.index', compact(['page', 'fields']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
