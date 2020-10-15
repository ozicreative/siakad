<?php

namespace App\Controllers;

use App\Models\Mkelas;

class Kelas extends BaseController
{

    public function __construct()
    {
        $this->Mkelas = new Mkelas();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Daftar kelas',
            'kelas' => $this->Mkelas->getData(),
            'konten' => 'kelas/index'
        );
        return view('_partial/wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'lvl_kelas' => $this->request->getPost('lvl_kelas'),
            'active' => $this->request->getPost('active'),
        );
        $this->Mkelas->tambah($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('kelas'));
    }
    public function edit($id)
    {
        $data = array(
            'id_kelas' => $id,
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'lvl_kelas' => $this->request->getPost('lvl_kelas'),
            'active' => $this->request->getPost('active'),
        );
        $this->Mkelas->ubah($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to(base_url('kelas'));
    }

    public function delete($id)
    {
        $data = array(
            'id_kelas' => $id,
        );
        $this->Mkelas->hapus($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url('kelas'));
    }
}
