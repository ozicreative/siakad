<?php

namespace App\Controllers;

use App\Models\Mkehadiran;
use App\Models\Mjadwal;
use phpDocumentor\Reflection\Types\This;

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
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->back();
        // $data = $this->input->post();

        // $ret  = $this->mkehadiran->simpan($data);

        // if ($ret["status"] == 1) {
        //     $res = $this->mmaster->response("success", "Document saved successfully");
        // } else {
        //     $res = $this->mmaster->response("error", "Save failed");
        // }

        // echo json_encode($res);
    }
}
