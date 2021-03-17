<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getList(Request $request)
    {
        // $sortBy = $request->sortBy ?? 0;
        $queryQ = $request->searchQ ?? '';
        $fields = $request->fields ?? [];
        $page = $request->page ?? 1;
        $perPage = $request->perPage ?? 3;
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

        $products = $object->offset($start)->limit($perPage);
        $products = $products->get();
        $total = $object->count();

        $this->setActions($products);

        return response()->json([
            'products' => $products,
            'perPage' => $perPage,
            'total' => $total,
            'allPages' => round($total / $perPage)
        ]);
    }
}
