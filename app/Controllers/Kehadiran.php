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

        // $data = array(
        //     'title' => 'Daftar Kehadiran',
        //     'kehadiran' => $this->Mkehadiran->getAll(),
        //     'kelas' => $this->Mjadwal->getKelas(),
        //     'tbl_active' => $this->Mactive->getData(),
        //     'konten' => 'kehadiran/index'
        // );
        // return view('_partial/wrapper', $data);
    }

    public function view($nomer)
    {
        $data["title"] = "Data Kehadiran";
        $data["datagrid"] = $this->Mkehadiran->getData($nomer);
        $data["konten"] = "kehadiran/datasiswa";

        return view('_partial/wrapper', $data);

        // $data = array(
        //     'title' => 'Data Kehadiran Siswa',
        //     'kehadiran' => $this->Mkehadiran->getData($nomer),
        //     'konten' => 'kehadiran/datasiswa'
        // );
        // return view('_partial/wrapper', $data);
    }

    public function generate()
    {
        helper('text');

        $data = $this->request->getPost();
        $nomer = random_string('allnum', 10);

        $this->Mkehadiran->generate($data, $nomer);
        return view('_partial/wrapper', $data);

        // helper('text');

        // $data = array(
        //     'title' => 'Tambah Kehadiran',
        //     'kelasid' => $this->request->getPost(),
        //     'tanggal' => $this->request->getPost(),
        //     'konten' => 'kehadiran/index'
        // );

        // $nomer = random_string('allnum', 10);

        // $this->Mkehadiran->generate($data, $nomer);
        // return view('_partial/wrapper', $data);
    }
}
