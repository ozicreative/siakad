<?php

namespace App\Controllers;

use App\Models\Mkbm;
use App\Models\Mjadwal;

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
}
