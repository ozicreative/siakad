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
		$data = $this->input->post();
		$nomer = uniqid('',$data["tanggal"]);
		// $res = $this->mmaster->response("error",$guid);

		$ret  = $this->mkehadiran->generate($data,$nomer);
		
		if ($ret["status"]==1){
			// $res = $this->mmaster->response("success","Document generated successfully");
			$res["responseCode"] = 200;
			$res["responseMsg"]  = "Document generated successfully";
			$res["key_kehadiran"] = $nomer;    
		}elseif ($ret["status"]==2){
			// $res = $this->mmaster->response("error","Siswa tidak ada di kelas tersebut");
			$res["responseCode"] = 401;
            $res["responseMsg"]  = "Siswa tidak ada di kelas tersebut";
			$res["key_kehadiran"] = $nomer;    
		}else{
			// $res = $this->mmaster->response("error","Generate failed");
			$res["responseCode"] = 401;
            $res["responseMsg"]  = "Generate failed";
			$res["key_kehadiran"] = $nomer;    
		}

		echo json_encode($res);
	}

    public function save()
	{
		$data = $this->input->post();

		$ret  = $this->mkehadiran->simpan($data);
		
		if ($ret["status"]==1){
			$res = $this->mmaster->response("success","Document saved successfully");
		}else{
			$res = $this->mmaster->response("error","Save failed");
		}

		echo json_encode($res);
	}
}
