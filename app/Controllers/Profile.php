<?php

namespace App\Controllers;

use App\Models\Mauth;

class Profile extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Mauth = new Mauth();
    }

    public function index()
    {
        $data = [
            'title' => 'Profile',
            'konten' => 'profile/index'
        ];
        return view('_partial/wrapper', $data);
    }

    public function edit($iduser)
    {
        $data = [
            'title' => 'Edit Profile',
            'validation' => \Config\Services::validation(),
            'profile' => $this->Mauth->getUser($iduser),
            'konten' => 'profile/edit'
        ];
        return view('_partial/wrapper', $data);
    }

    public function update($id)
    {
        $pLama = $this->Mauth->getUser($this->request->getPost('id_user'));
        if ($pLama['username'] == $this->request->getPost('username')) {
            $roleUsername = 'required';
        } else {
            $roleUsername = 'required|is_unique[user.username]';
        }

        if (!$this->validate([
            'nama_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'username' => [
                'rules' => $roleUsername,
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada, gunakan username lain.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'email' => [
                'rules' => 'is_unique[user.email]',
                'errors' => [
                    'is_unique' => '{field} sudah terdaftar, gunakan email yang belum pernah didaftarkan sebelumnya.'
                ]
            ],
            'img' => [
                'rules' => 'max_size[img,1024]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, max 1mb.',
                    'is_image' => 'Yang anda upload bukan file gambar.',
                    'mime_in' => 'Format gambar harus jpg/jpeg/png.'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $fileImg = $this->request->getFile('img');
        if ($fileImg->getError() == 4) {
            $namaImg = $this->request->getPost('gambarLama');
        } else {
            $namaImg = $fileImg->getRandomName();
            $fileImg->move('assets/img', $namaImg);
            unlink('assets/img/' . $this->request->getPost('gambarLama'));
        }
        $this->Mauth->save([
            'id_user' => $id,
            'nama_user' => $this->request->getPost('nama_user'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'email' => $this->request->getPost('email'),
            'img' => $namaImg
        ]);
        session()->setFlashdata('pesan', 'Profile berhasil diubah.');
        return redirect()->to('profile/index');
    }
}
