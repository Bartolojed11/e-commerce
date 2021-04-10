<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public $password = '';

    public function __construct() {
        $this->password = Str::random(12);
    }

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => "required|email|unique:admins,email,$this->admin_id,admin_id",
        ];
    }


    public function prepared()
    {
        return [
            'first_name' => $this->firstname,
            'last_name' => $this->lastname,
            'middle_name' => $this->middlename ?? '',
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ];
    }
}
