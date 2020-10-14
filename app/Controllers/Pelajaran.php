<?php

namespace App\Controllers;

use App\Models\Mpelajaran;

class Pelajaran extends BaseController
{

    public function __construct()
    {
        $this->Mpelajaran = new Mpelajaran();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Daftar Pelajaran',
            'pelajaran' => $this->Mpelajaran->getData(),
            'konten' => 'pelajaran/index'
        );
        return view('_partial/wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'nama_pelajaran' => $this->request->getPost('nama_pelajaran'),
            'lvl_kls' => $this->request->getPost('lvl_kls'),
            'active' => $this->request->getPost('active'),
        );
        $this->Mpelajaran->tambah($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('pelajaran'));
    }
    public function edit($id)
    {
        $data = array(
            'id_pelajaran' => $id,
            'nama_pelajaran' => $this->request->getPost('nama_pelajaran'),
            'lvl_kls' => $this->request->getPost('lvl_kls'),
            'active' => $this->request->getPost('active'),
        );
        $this->Mpelajaran->ubah($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to(base_url('pelajaran'));
    }

    public function delete($id)
    {
        $data = array(
            'id_pelajaran' => $id,
        );
        $this->Mpelajaran->hapus($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url('pelajaran'));
    }
}
