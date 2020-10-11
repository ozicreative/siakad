<?php namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
        $data = array(
            'title' => 'Dashboard',
            'konten' => 'dashboard'
        );
		return view('_partial/wrapper', $data);
	}

	//--------------------------------------------------------------------

}
