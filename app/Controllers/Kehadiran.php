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
        $data["title"] = "Data Kehadiran";
        $data["datagrid"] = $this->Mkehadiran->getData($nomer);
        $data["konten"] = "kehadiran/datasiswa";

        return view('_partial/wrapper', $data);
    }

    public function generate()
    {
        helper('text');

        $data = [
            'kelas_id' => $this->request->getPost('kelas_id'),
            'tanggal' => $this->request->getPost('tanggal')
        ];
        $nomer = uniqid();

        $this->Mkehadiran->generate($data, $nomer);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('kehadiran'));
    }

    public function edit($id)
    {
        $data = array(
            'id_kehadiran' => $id,
            'status' => $this->request->getPost('status'),
            'keterangan' => $this->request->getPost('keterangan'),
        );

        $this->Mkehadiran->ubah($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->back();
    }
}
