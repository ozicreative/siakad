<?php

namespace App\Controllers;

use App\Models\Mjadwal;
use App\Models\Mguru;
use App\Models\Mactive;
use App\Models\Mpelajaran;

class Jadwal extends BaseController
{

    public function __construct()
    {
        $this->Mjadwal = new Mjadwal();
        $this->Mguru = new Mguru();
        $this->Mactive = new Mactive();
        $this->Mpelajaran = new Mpelajaran();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Daftar Jadwal',
            'jadwal' => $this->Mjadwal->getData(),
            'kelas' => $this->Mjadwal->getKelas(),
            'guru' => $this->Mguru->getData(),
            'pelajaran' => $this->Mpelajaran->getData(),
            'tbl_active' => $this->Mactive->getData(),
            'konten' => 'jadwal/index'
        );
        return view('_partial/wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'kelas_id' => $this->request->getPost('kelas_id'),
            'pelajaran_id' => $this->request->getPost('pelajaran_id'),
            'guru_id' => $this->request->getPost('guru_id'),
            'hari' => $this->request->getPost('hari'),
            'mulai' => $this->request->getPost('mulai'),
            'selesai' => $this->request->getPost('selesai'),
            'active' => $this->request->getPost('active'),
        );
        $this->Mjadwal->tambah($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('jadwal'));
    }
    public function edit($id)
    {
        $data = array(
            'kelas_id' => $id,
            'pelajaran_id' => $this->request->getPost('pelajaran_id'),
            'guru_id' => $this->request->getPost('guru_id'),
            'hari' => $this->request->getPost('hari'),
            'mulai' => $this->request->getPost('mulai'),
            'selesai' => $this->request->getPost('selesai'),
            'active' => $this->request->getPost('active'),
        );
        $this->Mjadwal->ubah($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to(base_url('jadwal'));
    }

    public function delete($id)
    {
        $data = array(
            'id_kelas' => $id,
        );
        $this->Mjadwal->hapus($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url('jadwal'));
    }
}
