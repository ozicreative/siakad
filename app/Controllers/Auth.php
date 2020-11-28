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
                            'created_at' => $user->created_at,
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

    // public function profile($iduser)
    // {
    //     $data = array(
    //         'title' => 'Profile',
    //         //'validation' => \Config\Services::validation(),
    //         'user' => $this->Mauth->getUser($iduser),
    //         'konten' => 'user/vprofile'
    //     );
    //     return view('_partial/wrapper', $data);
    // }

    // public function updateProfile($id)
    // {
    //     $pLama = $this->Mauth->getUser($this->request->getVar('id_user'));
    //     if ($pLama['username'] == $this->request->getVar('username')) {
    //         $roleUsername = 'required';
    //     } else {
    //         $roleUsername = 'required|is_unique[user.username]';
    //     }
        
    //     if (!$this->validate([
    //         'nama_user' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} tidak boleh kosong'
    //             ]
    //             ],
    //         'username' => [
    //             'rules' => $roleUsername,
    //             'errors' => [
    //                 'required' => '{field} tidak boleh kosong',
    //                 'is_unique' => '{field} sudah ada, gunakan username lain.'
    //             ]
    //             ],
    //         'password' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} tidak boleh kosong'
    //             ]
    //             ],
    //         'email' => [
    //             'rules' => 'is_unique[user.email]',
    //             'errors' => [
    //                 'is_unique' => '{field} sudah terdaftar, gunakan email yang belum pernah didaftarkan sebelumnya.'
    //             ]
    //             ],
    //         'img' => [
    //             'rules' => 'max_size[img,1024]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]',
    //             'errors' => [
    //                 'max_size' => 'Ukuran gambar terlalu besar, max 1mb.',
    //                 'is_image' => 'Yang anda upload bukan file gambar.',
    //                 'mime_in' => 'Format gambar harus jpg/jpeg/png.'
    //             ]
    //             ]
    //     ])) {
    //         return redirect()->back()->withInput();
    //     }
    //     $fileImg = $this->request->getFile('img');
    //     if ($fileImg->getError() == 4) {
    //         $namaImg = $this->request->getVar('gambarLama');
    //     } else {
    //         $namaImg = $fileImg->getRandomName();
    //         $fileImg->move('assets/img', $namaImg);
    //         unlink('assets/img/' . $this->request->getVar('gambarLama'));
    //     }
    //     $this->Mauth->save([
    //         'id_user' => $id,
    //         'nama_user' => $this->request->getVar('nama_user'),
    //         'username' => $this->request->getVar('username'),
    //         'password' => $this->request->getVar('password'),
    //         'email' => $this->request->getVar('email'),
    //         'img' => $namaImg
    //     ]);
    //     session()->setFlashdata('pesan', 'Profile berhasil diubah.');
    //     return redirect()->to('auth/profile');
    // }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth'));
    }
}
