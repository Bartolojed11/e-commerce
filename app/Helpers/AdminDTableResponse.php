<?php

namespace App\Helpers;

trait AdminDTableResponse {

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
}