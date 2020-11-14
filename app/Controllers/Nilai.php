<?php

namespace App\Controllers;

use App\Models\Mnilai;
use App\Models\Mjadwal;

class Nilai extends BaseController
{

    public function __construct()
    {
        $this->Mnilai = new Mnilai();
        $this->Mjadwal = new Mjadwal();
        helper('form');
    }

    public function index()
    {
        $data["title"] = 'Daftar Nilai';
        $data["datakelas"] = $this->Mjadwal->getKelas();
        $data["datamapel"] = $this->Mjadwal->getPelajaran($data["datakelas"][0]["id_kelas"]);
        $data["datagrid"] = $this->Mnilai->getAll();
        $data["konten"] = "nilai/index";

        return view('_partial/wrapper', $data);
    }

    public function view($nomer)
    {
        $data["title"] = 'Daftar Nilai Siswa';
        $data["datagrid"] = $this->Mnilai->getData($nomer);
        $data["konten"] = "nilai/datasiswa";

        return view('_partial/wrapper', $data);
    }

    public function generate()
    {
        helper('text');

        $data = [
            'kelas_id' => $this->request->getPost('kelas_id'),
            'tanggal' => $this->request->getPost('tanggal'),
            'pelajaran_id' => $this->request->getPost('pelajaran_id'),
            'jenis' => $this->request->getPost('jenis'),
        ];
        $nomer = uniqid();

        $this->Mnilai->generate($data, $nomer);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('nilai'));
    }

    public function edit($id)
    {
        $data = array(
            'id_nilai' => $id,
            'total_nilai' => $this->request->getPost('total_nilai')
        );

        $this->Mnilai->ubah($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->back();
    }
}
