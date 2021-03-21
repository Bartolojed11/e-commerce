<?php

namespace App\Helpers;

trait AdminResponse {

    protected function setActions($data, $actions = [])
    {   
        $page = $this->page;

        $primaryKey = $this->module->getKeyName();
        
        return $data->each(function ($item) use ($actions, $primaryKey, $page) {
            $operation = [];
            foreach($actions as $action) {
                $operation[$action] = route("admin.$page.$action", [$page => $item->{$primaryKey}]);
            }

            $item->actions = $operation;
        });
    }

    protected function setFields()
    {
        $fields = [
            'header' => $this->header,
            'columns' => $this->columns
        ];

        return json_encode($fields);
    }

    protected function setResponse($action = 'add', $status = true, $route='', $message = '')
    {
        $method = 'success';

        if ($message == '' && $status == false) {
            $message = config("error_response.$action") . $this->page . ' !';
            $method = 'error';
        }

        if ($message == '' && $status == true) {
            $message = config("success_response.$action") . $this->page . ' !';
        }

        flash($message)->{$method}();

        if ($route == '') {
            return redirect()->back();
        }

        return redirect($route);
    }
}