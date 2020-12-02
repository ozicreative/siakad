<?php

namespace App\Controllers;

use App\Models\Mdashboard;

class Dashboard extends BaseController
{
	public function __construct()
	{
		$this->Mdashboard = new Mdashboard();
		helper('form');
	}

	public function index()
	{
		// $datahadir = $this->Mdashboard->gethadir();

		// $data["title"] = "Dashboard";
		// $data["siswa"] = $datahadir[0]["siswa"];
		// $data["alpha"] = $datahadir[0]["alpha"];
		// $data["sakit"] = $datahadir[0]["sakit"];
		// $data["top"] = $this->Mdashboard->gettop();
		// $data["avgkelas"] = $this->Mdashboard->avgkelas();
		// $data["konten"] = "dashboard";

		$datahadir = $this->Mdashboard->gethadir();

		$data["title"] = "Dashboard";
		$data["siswa"] = $datahadir[0]["siswa"];
		$data["alpha"] = $datahadir[0]["alpha"];
		$data["sakit"] = $datahadir[0]["sakit"];
		$data['grafik'] = $this->Mdashboard->getGrafik();
		$data["konten"] = "dashboard";

		return view('_partial/wrapper', $data);
	}
}
