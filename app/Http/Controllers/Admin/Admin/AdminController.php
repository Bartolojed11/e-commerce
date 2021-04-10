<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Controllers\Admin\SearchController;
use App\Helpers\AdminDTableResponse;
use App\Helpers\AdminResponse;
use App\Http\Requests\Admin\AdminRequest;
use App\Events\Admin\NewAdmin;

class AdminController extends SearchController
{

    use AdminDTableResponse, AdminResponse;

    public $page = 'admin';
    public $module = '';
    public $header = [
        'Admin Id',
        'Full Name',
        'Email',
        'Actions'
    ];

    public $columns = [
        'admin_id',
        'full_name',
        'email',
        'actions',
    ];

    public $actions = [
        'view' => 'show',
        'delete' => 'destroy'
    ];

    public function __construct()
    {
        $this->module = New Admin;
        $this->columnsExcept = ['full_name'];
        $this->columnsExceptParams = ['first_name', 'last_name', 'middle_name'];
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

        return view('admin.admins.index', compact(['page', 'fields', 'key']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = $this->page;
        return view('admin.admins.form', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $admin = new Admin;
        $admin->fill($request->prepared());

        if (! $admin->save()) {
            return $this->setResponse('add', false);
        }

        $admin->password = $request->password;
        event(new NewAdmin($admin));
       
        return $this->setResponse('add', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('admin.admin.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $page = $this->page;
        return view('admin.admins.form', compact(['page', 'admin']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        if (! $product->delete()) {
            return $this->setResponse('delete', false);
        }

        return $this->setResponse('delete', true);
    }
}
