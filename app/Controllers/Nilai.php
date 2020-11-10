<?php

namespace App\Controllers;

use App\Models\Mnilai;
use App\Models\Mjadwal;
use App\Models\Mpelajaran;

class Nilai extends BaseController
{

    public function __construct()
    {
        $this->Mnilai = new Mnilai();
        $this->Mjadwal = new Mjadwal();
        $this->Mpelajaran = new Mpelajaran();
        helper('form');
    }

    public function index()
    {
        $data =[
            'title' => 'Daftar Nilai Siswa',
            'datakelas' => $this->Mjadwal->getKelas(),
            'datamapel' => $this->Mpelajaran->getData(),
            'datagrid' => $this->Mnilai->getData(),
            'konten' => 'nilai/index'
        ];
        return view('_partial/wrapper', $data);
    }
}