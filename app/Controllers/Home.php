<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TugasModel;

class Home extends BaseController
{
	protected $tugas_model;
	protected $kategori_model;
	public function __construct()
	{
		$this->tugas_model = new TugasModel();
		$this->user_model = new UserModel();
	}

	public function index()
	{
		if (!session()) {
			return redirect()->to('/login');
		} else {
			if (session('role') == 4) {
				// $data = [
				// 	'title' => 'Dashboard',
				// 	'page_header' => 'Dashboard',
				// 	'user_data' => $this->user_model->getCurrentUserData(),
				// 	'my_ilmiah' => $this->tugas_model->countMyIlmiah(),
				// 	'my_tugas_besar' => $this->tugas_model->countMyTugasBesar(),
				// ];
				// return view('home', $data);
				dd($this->tugas_model->myIncomingSidang());
				// dd($data['user_data']);
			} else {
				$data = [
					'title' => 'Dashboard',
					'page_header' => 'Dashboard',
				];
				return view('home', $data);
			}
		}
	}

	//--------------------------------------------------------------------

}
