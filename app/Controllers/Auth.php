<?php

namespace App\Controllers;

use App\Models\Mauth;

class Auth extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->Mauth = new Mauth();
    }

    public function login()
    {
        $data = array(
            'title' => 'Login',
        );
        return view('auth/login', $data);
    }
}
