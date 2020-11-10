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
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
        ])) {
            //Jika valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $level = $this->request->getPost('level');

            if ($level == 1) {
                $cek_user = $this->Mauth->login_user($username, $password);
                if ($cek_user) {
                    // jika benar
                    session()->set('log', true);
                    session()->set('username', $cek_user['username']);
                    session()->set('nama', $cek_user['nama_user']);
                    session()->set('img', $cek_user['img']);
                    session()->set('level', $level);

                    return redirect()->to(base_url('dashboard'));
                } else {
                    // jika salah
                    session()->setFlashdata('pesan', 'Login Gagal, Username atau Password salah !');

                    return redirect()->to(base_url('auth'));
                }
            } elseif ($level == 2) {
                echo 'Admin';
            } elseif ($level == 3) {
                echo 'Guru';
            } elseif ($level == 5) {
                echo 'Member';
            }
        } else {
            //Jika tdk valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('nama');
        session()->remove('img');
        session()->remove('level');

        session()->setFlashdata('sukses', 'Logout berhasil');
        return redirect()->to(base_url('auth'));
    }
}
