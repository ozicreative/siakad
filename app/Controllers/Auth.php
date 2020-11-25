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

    public function login()
    {
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required',
                'password' => 'required'
            ];
            $validate = $this->validate($rules);
            if ($validate) {
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
                $model = new Mauth();
                $user = $model->asObject()->where('username', $username)->orwhere('email', $username)->first();
                if ($user) {
                    if (password_verify($password, $user->password)) {
                        session()->set([
                            'nama_user' => $user->nama_user,
                            'username' => $user->username,
                            'email' => $user->email,
                            'img' => $user->img,
                            'level' => $user->level,
                            'logged_in' => true
                        ]);
                        return redirect('dashboard');
                    }
                }
                return redirect()->back()->withInput()->with('error', 'Username atau Password salah!');
            } else {
                return redirect()->back()->withInput()->with('validation', $this->validator);
            }
            return redirect()->to(base_url('auth'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth'));
    }
}
