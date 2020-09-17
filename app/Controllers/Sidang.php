<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\TugasModel;
use App\Models\StasePpdsModel;
use App\Models\StaseModel;
use App\Models\SupervisorModel;
use CodeIgniter\Validation\Rules;

class Sidang extends BaseController
{
    protected $tugas_model;
    protected $kategori_model;
    protected $stase_ppds_model;
    protected $stase_model;
    protected $spv_model;
    public function __construct()
    {
        $this->tugas_model = new TugasModel();
        $this->kategori_model = new KategoriModel();
        $this->stase_ppds_model = new StasePpdsModel();
        $this->stase_model = new StaseModel();
        $this->spv_model = new SupervisorModel();
    }

    public function view()
    {
        $data = [
            'title' => 'Daftar Sidang',
            'page_header' => 'Daftar Sidang',
            'query' => $this->tugas_model->getAllTugasBesar()
        ];

        return view('sidang/index', $data);
    }

    public function detail($id_sidang)
    {
        $data = [
            'title' => 'Sidang',
            'query' => $this->tugas_model->getSpecificTugas($id_sidang),
            'page_header' => 'Daftar Sidang',
        ];

        return view('sidang/index', $data);
    }
}
