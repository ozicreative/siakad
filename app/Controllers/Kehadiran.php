<?php

namespace App\Controllers;

use App\Models\Mkehadiran;
use App\Models\Mactive;

class Kehadiran extends BaseController
{

    public function __construct()
    {
        $this->Mkehadiran = new Mkehadiran();
        $this->Mactive = new Mactive();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Daftar Hadir',
            'kehadiran' => $this->Mkehadiran->getData(),
            'tbl_active' => $this->Mactive->getData(),
            'konten' => 'kehadiran/index'
        );
        return view('_partial/wrapper', $data);
    }
}
