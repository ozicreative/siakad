<?php

namespace App\Controllers;

use App\Models\Msiswa;
use App\Models\Mactive;

class Siswa extends BaseController
{

    public function __construct()
    {
        $this->Msiswa = new Msiswa();
        $this->Mactive = new Mactive();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Daftar Siswa',
            'siswa' => $this->Msiswa->kelasSiswa(),
            'kelas' => $this->Msiswa->getKelas(),
            'tbl_active' => $this->Mactive->getData(),
            'konten' => 'siswa/index'
        );
        return view('_partial/wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'nisn' => $this->request->getPost('nisn'),
            'tgl_lhr' => $this->request->getPost('tgl_lhr'),
            'nama_siswa' => $this->request->getPost('nama_siswa'),
            'kelahiran' => $this->request->getPost('kelahiran'),
            'gender' => $this->request->getPost('gender'),
            'alamat' => $this->request->getPost('alamat'),
            'periode' => $this->request->getPost('periode'),
            'kelas_id' => $this->request->getPost('kelas_id'),
            'active' => $this->request->getPost('active'),
        );
        $this->Msiswa->tambah($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('siswa'));
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
        $this->Msiswa->ubah($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to(base_url('siswa'));
    }

    public function delete($id)
    {
        $data = array(
            'id_siswa' => $id,
        );
        $this->Msiswa->hapus($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url('siswa'));
    }
}
