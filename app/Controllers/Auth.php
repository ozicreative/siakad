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
        );
        return view('auth/login', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harap isi bidang ini!!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harap isi bidang ini!!!'
                ]
            ],
        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->Mauth->login($username, $password);
            if ($cek) {
                session()->set('log', true);
                session()->set('nama_user', $cek['nama_user']);
                session()->set('username', $cek['username']);
                session()->set('level', $cek['level']);

                return redirect()->to(base_url('dashboard'));
            } else {
                session()->setFlashdata('pesan','Login gagal !!!');
                return redirect()->to(base_url('auth/login'));
            }
        } else {
            # code...
        }
    }
}
