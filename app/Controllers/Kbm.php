<?php

namespace App\Controllers;

use App\Models\Mkbm;
use App\Models\Mjadwal;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kbm extends BaseController
{

    public function __construct()
    {
        $this->Mkbm = new Mkbm();
        $this->Mjadwal = new Mjadwal();
        helper('form');
    }

    public function index()
    {
        $data["title"] = 'Kegiatan Belajar Mengajar';
        $data["datagrid"] = $this->Mkbm->getAll();
        $data["datajadwal"] = $this->Mkbm->getJadwal();
        $data["datakelas"] = $this->Mjadwal->getKelas();
        $data["datamapel"] = $this->Mjadwal->getPelajaran($data["datakelas"][0]["id_kelas"]);
        $data["dataguru"] = $this->Mjadwal->getGuru();
        $data["konten"] = "kbm/index";

        return view('_partial/wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'jadwal_id' => $this->request->getPost('jadwal_id'),
            'tanggal' => $this->request->getPost('tanggal'),
            't_hadir' => $this->request->getPost('hadir'),
            't_tdkhadir' => $this->request->getPost('tdkhadir'),
            'materi' => $this->request->getPost('materi'),
            'active' => '1'
        );
        $this->Mkbm->tambah($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('kbm'));
    }

    public function edit($id)
    {
        $data = array(
            'id_kbm' => $id,
            'jadwal_id' => $this->request->getPost('jadwal_id'),
            'tanggal' => $this->request->getPost('tanggal'),
            'materi' => $this->request->getPost('materi'),
            't_hadir' => $this->request->getPost('hadir'),
            't_tdkhadir' => $this->request->getPost('tdkhadir'),
            'active' => '1'
        );
        $this->Mkbm->ubah($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to(base_url('kbm'));
    }

    public function delete($id)
    {
        $data = array(
            'id_kbm' => $id,
        );
        $this->Mkbm->hapus($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url('kbm'));
    }
}
