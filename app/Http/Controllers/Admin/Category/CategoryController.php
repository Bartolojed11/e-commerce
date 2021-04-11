<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Requests\Admin\CategoryRequest;

use App\Helpers\AdminDTableResponse;
use App\Helpers\AdminResponse;

class CategoryController extends SearchController
{
    use AdminDTableResponse, AdminResponse;

    public $page = 'category';
    public $module = '';
    public $header = [
        'Category Id',
        'Name',
        'Actions'
    ];

    public $columns = [
        'category_id',
        'name',
        'actions',
    ];

    public $actions = [
        'view' => 'show',
        'edit' => 'edit',
        'delete' => 'destroy'
    ];

    public function __construct()
    {
        $this->module = New Category;
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

        return view('admin.categories.index', compact(['page', 'fields', 'key']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = $this->page;
        return view('admin.categories.form', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->module;
        $category->fill($request->prepared());
        
        // TODO session flashing of status on front end
        if (! $category->save()) {
            return $this->setResponse('add', false);
        }

        return $this->setResponse('add', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $page = $this->page;
        return view('admin.categories.view', compact(['category', 'page']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $page = $this->page;
        return view('admin.categories.form', compact(['category', 'page']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->prepared());
        $route = route('admin.categories.edit', ['category' => $category->category_id]);
        
        // TODO session flashing of status
        if (! $category->save()) {
            return $this->setResponse('update', false, $route);
        }

        return $this->setResponse('update', true, $route);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (! $category->delete()) {
            return $this->setResponse('delete', false);
        }

        return $this->setResponse('delete', true);
    }
}
