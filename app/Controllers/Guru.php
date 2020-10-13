<?php

namespace App\Controllers;

use App\Models\Mguru;

class Guru extends BaseController
{

    public function __construct()
    {
        $this->Mguru = new Mguru();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Daftar Guru',
            'guru' => $this->Mguru->getData(),
            'konten' => 'guru/index'
        );
        return view('_partial/wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'nama_guru' => $this->request->getPost('nama_guru'),
            'active' => $this->request->getPost('active'),
        );
        $this->Mguru->tambah($data);
        return redirect()->to(base_url('guru'));
    }

    public function edit($id)
    {
        $data = array(
            'id_guru' => $id,
            'nama_guru' => $this->request->getPost('nama_guru'),
            'active' => $this->request->getPost('active'),
        );
        $this->Mguru->ubah($data);
        return redirect()->to(base_url('guru'));
    }

    public function delete($id)
    {
        $data = array(
            'id_guru' => $id,
        );
        $this->Mguru->hapus($data);
        return redirect()->to(base_url('guru'));
    }
}
