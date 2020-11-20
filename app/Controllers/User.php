<?php

namespace App\Controllers;

use App\Models\Muser;

class User extends BaseController
{
    public function __construct()
    {
        $this->Muser = new Muser();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'User',
            'user' => $this->Muser->getData(),
            'konten' => 'user/index'
        );
        return view('_partial/wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'img' => 'default.png',
            'level' => $this->request->getPost('level'),
            'active' => '1'
        );
        $this->Muser->tambah($data);
        session()->setFlashdata('pesan', 'User baru berhasil ditambahkan.');
        return redirect()->to(base_url('user'));
    }

    public function edit($id)
    {
        $data = array(
            'id_user' => $id,
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'img' => $this->request->getPost('img'),
            'level' => $this->request->getPost('level'),
            'active' => $this->request->getPost('active')
        );
        $this->Muser->ubah($data);
        session()->setFlashdata('pesan', 'User berhasil diubah.');
        return redirect()->to(base_url('user'));
    }

    public function delete($id)
    {
        $data = array(
            'id_user' => $id,
        );
        $this->Muser->hapus($data);
        session()->setFlashdata('pesan', 'User berhasil dihapus.');
        return redirect()->to(base_url('user'));
    }
}
