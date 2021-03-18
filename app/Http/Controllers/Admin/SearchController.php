<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Helpers\AdminResponse;

class SearchController extends Controller
{
    use AdminResponse;

    public function getList(Request $request)
    {
        // $sortBy = $request->sortBy ?? 0;
        $queryQ = $request->searchQ ?? '';
        $fields = $request->fields ?? [];
        $page = $request->page ?? 1;
        $perPage = $request->perPage ?? config('app.per_page');
        $start = ($page * $perPage) - $perPage;

        $object = $this->module;
        if ($queryQ != '') {
            $fields =  explode("," , $fields);
            foreach($fields as $ndx => $field) {
                if ($field == 'actions') continue;
                if ($ndx > 0) {
                    $object = $object->orWhere($field, 'LIKE', "%$queryQ%");
                } else {
                    $object = $object->where($field, 'LIKE', "%$queryQ%");
                }
            }
        }

        $data = $object->offset($start)->limit($perPage);
        $data = $data->get();
        $total = $object->count();
        $actions = $this->actions;

        $this->setActions($data, $actions);

        return response()->json([
            Str::plural($this->page) => $data,
            'perPage' => $perPage,
            'total' => $total,
            'allPages' => round($total / $perPage)
        ]);
    }
}
