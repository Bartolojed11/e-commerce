<?php

namespace App\Helpers;

trait AdminResponse {
    
    public $withKey;
    public $withValue;

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



        if ($route == '' && empty($this->withKey)) {
            return redirect()->back();
        }
       
        if (! empty($this->withKey)) {
            return redirect($route)->with($this->withKey, $this->withValue);
        }

        return redirect($route);
    }

    public function setWith($withKey, $withValue)
    {
       $this->withValue = $withValue;
       $this->withKey = $withKey;
    }
}