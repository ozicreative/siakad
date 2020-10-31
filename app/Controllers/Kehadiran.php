<?php

namespace App\Controllers;

use App\Models\Mkehadiran;
use App\Models\Mactive;
use App\Models\Mjadwal;

class Kehadiran extends BaseController
{

    public function __construct()
    {
        $this->Mkehadiran = new Mkehadiran();
        $this->Mactive = new Mactive();
        $this->Mjadwal = new Mjadwal();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Daftar Kehadiran',
            'kehadiran' => $this->Mkehadiran->getAll(),
            'kelas' => $this->Mjadwal->getKelas(),
            'tbl_active' => $this->Mactive->getData(),
            'konten' => 'kehadiran/index'
        );
        return view('_partial/wrapper', $data);
    }

    public function view($nomer)
    {
        $data = array(
            'title' => 'Data Kehadiran Siswa',
            'kehadiran' => $this->Mkehadiran->getData($nomer),
            'konten' => 'kehadiran/datasiswa'
        );
        return view('_partial/wrapper', $data);
    }

    public function generate()
    {
        $data = array(
            'title' => 'Tambah Kehadiran',
            'key_kehadiran' => $this->request->getPost(),
            'konten' => 'kehadiran/'
        );
        $nomer = uniqid('', $data["tanggal"]);

        $this->Mkehadiran->generate($data, $nomer);
    }
}
