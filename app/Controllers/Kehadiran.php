<?php

namespace App\Controllers;

use App\Models\Mkehadiran;
use App\Models\Mjadwal;

class Kehadiran extends BaseController
{

    public function __construct()
    {
        $this->Mkehadiran = new Mkehadiran();
        $this->Mjadwal = new Mjadwal();
        helper('form');
    }

    public function index()
    {
        $data["title"] = "Data Kehadiran";
        $data["datakelas"] = $this->Mjadwal->getKelas();
        $data["datagrid"] = $this->Mkehadiran->getAll();
        $data["konten"] = "kehadiran/index";

        return view('_partial/wrapper', $data);
    }

    public function view($nomer)
    {
        $data["title"] = "Data Kehadiran Siswa";
        $data["datagrid"] = $this->Mkehadiran->getData($nomer);
        $data["konten"] = "kehadiran/datasiswa";

        return view('_partial/wrapper', $data);
    }

    public function generate()
    {
        helper('text');

        $nomer = random_string('allnum', 10);

        $data = array(
            'title' => 'Data Kehadiran',
            'key_kehadiran' => $nomer,
            'tanggal' => $this->request->getPost('tanggal'),
            'konten' => 'kehadiran/index'
        );

        $siswa = $this->Mkehadiran->getDataSiswa($data["kelas_id"]);
        foreach($siswa as $key => $row){
            for ($i=0; $i < count($row); $i++) { 
                $data[$i][$key] = $row[$i];
            }
        }
    }
}
