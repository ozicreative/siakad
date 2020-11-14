<?php

namespace App\Controllers;

use App\Models\Mrapor;

class Rapor extends BaseController
{
    public function __construct()
    {
        $this->Mrapor = new Mrapor();
        helper('form');
    }

    public function index()
    {
        $data["title"] = "Laporan";
        $data["datagrid"] = $this->Mrapor->getAll();
        $data["konten"] = "rapor/index";

        return view('_partial/wrapper', $data);
    }

    public function view($id)
    {
        $ret = $this->Mrapor->getDataNilai($id);
        $retkh = $this->Mrapor->getDataKehadiran($id);

        if ($ret->num_row() > 0) {
            $ret = $ret->result_array();
            $data["kelas"] = $ret[0]["kelas"];
            $data["nama"] = $ret[0]["nama"];
            $data["periode"] = $ret[0]["periode"];
            $data["rapor"] = $ret;

            if ($retkh->num_row() > 0) {
                $retkh = $retkh->result_array();
                $data["absensi"] = $retkh;
            }
            return view('rapor/rsiswa', $data);
        } else {
            redirect()->back();
        }
    }
}
