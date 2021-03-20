<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Admin\SearchController;
use App\Helpers\AdminResponse;

class UserController extends SearchController
{
    use AdminResponse;

    public $page = 'user';
    public $module = '';
    public $header = [
        'User Id',
        'Full Name',
        'Email',
        // 'Status',
        'Actions'
    ];

    public $columns = [
        'user_id',
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
        $this->module = New User;
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

        return view('admin.users.index', compact(['page', 'fields']));
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
