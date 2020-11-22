<?php

namespace App\Controllers;

use App\Models\Muser;
use DateTime;

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
            'nama_user' => $this->request->getVar('nama_user'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
            'img' => 'default.png',
            'level' => $this->request->getVar('level'),
            'createdby' => session()->get('nama_user'),
            'createdon' => date('Y-m-d h:i:sa'),
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
            'nama_user' => $this->request->getVar('nama_user'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'img' => $this->request->getVar('img'),
            'level' => $this->request->getVar('level'),
            'updatedby' => session()->get('nama_user'),
            'updatedon' => date('Y-m-d h:i:sa'),
            'active' => '1'
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
