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

    public function index()
    {
        $data = array(
            'title' => 'Login',
            'konten' => 'index'
        );
        return view('_partial/wrapper', $data);
    }

    public function Login()
    {
    }
}
