<?php

namespace App\Helpers;

trait AdminResponse {

    protected function setActions($data, $actions = [])
    {   
        $page = $this->page;

        $primaryKey = $this->module->getKeyName();
        
        return $data->each(function ($item) use ($actions, $primaryKey, $page) {
            foreach($actions as $action) {
                $item->actions = [
                    $action => route("admin.$page.$action", [$page => $item->{$primaryKey}])
                ];
            }
        });
    }

    protected function setFields()
    {
        $fields = [
            'header' => $this->header,
            'columns' => $this->columns
        ];

        $fields = json_encode($fields);
        return $fields;
    }
}