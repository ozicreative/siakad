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
            'title' => 'Login'
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
                    'required' => '{field} Wajib diisi !!!.'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!!.'
                ]
            ],
        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek_user = $this->Mauth->login_user($username, $password);

            if ($cek_user) {
                //jika valid
                session()->set('log', true);
                session()->set('username', $cek_user['username']);
                session()->set('level', $cek_user['level']);
                session()->set('nama_user', $cek_user['nama_user']);
                session()->set('email', $cek_user['email']);
                session()->set('img', $cek_user['img']);
                return redirect()->to(base_url('dashboard'));
            } else {
                session()->setFlashdata('pesan', 'Login Gagal, Username atau Password salah !');
                return redirect()->to(base_url('auth'));
            }
        } else {
            session()->setFlashdata('pesan', 'Username atau Password tidak boleh kosong');
            return redirect()->to(base_url('auth'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('nama_user');
        session()->remove('Email');
        session()->remove('img');
        session()->remove('level');

        session()->setFlashdata('sukses', 'Logout berhasil');
        return redirect()->to(base_url('auth'));
    }
}
