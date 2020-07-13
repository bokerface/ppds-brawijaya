<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if (!session()) {
			return redirect()->to('/login');
		} else {
			$data['page_header'] = 'Dashboard';
			return view('home', $data);
		}
	}

	//--------------------------------------------------------------------

}
