<?php

namespace App\Controllers;

use App\Models\Mguru;
use App\Models\Mactive;

class Guru extends BaseController
{

    public function __construct()
    {
        $this->Mguru = new Mguru();
        $this->Mactive = new Mactive();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Daftar Guru',
            'guru' => $this->Mguru->getData(),
            'tbl_active' => $this->Mactive->getData(),
            'konten' => 'guru/index'
        );
        return view('_partial/wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'nuptk' => $this->request->getPost('nuptk'),
            'nama_guru' => $this->request->getPost('nama_guru'),
            'kelahiran' => $this->request->getPost('kelahiran'),
            'tgl_lhr' => $this->request->getPost('tgl_lhr'),
            'active' => $this->request->getPost('active'),
        );
        $this->Mguru->tambah($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('guru'));
    }

    public function edit($id)
    {
        $data = array(
            'id_guru' => $id,
            'nuptk' => $this->request->getPost('nuptk'),
            'nama_guru' => $this->request->getPost('nama_guru'),
            'kelahiran' => $this->request->getPost('kelahiran'),
            'tgl_lhr' => $this->request->getPost('tgl_lhr'),
            'active' => $this->request->getPost('active'),
        );
        $this->Mguru->ubah($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil dirubah.');
        return redirect()->to(base_url('guru'));
    }

    public function delete($id)
    {
        $data = array(
            'id_guru' => $id,
        );
        $this->Mguru->hapus($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url('guru'));
    }
}
