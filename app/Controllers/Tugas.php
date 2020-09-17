<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\TugasModel;
use App\Models\StasePpdsModel;
use App\Models\StaseModel;
use App\Models\SupervisorModel;
use CodeIgniter\Validation\Rules;

class Tugas extends BaseController
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
        return redirect()->to(base_url('/tugas/index'));
    }

    public function index($jenis_tugas = 'semua_tugas')
    {
        if ($jenis_tugas == 'ilmiah') {
            $data = [
                'title' => 'Daftar Ilmiah',
                'query' => $this->tugas_model->getAllIlmiah(),
                'page_header' => 'Daftar Ilmiah',
                'stase' => $this->stase_model->getAllStase()
            ];
        } elseif ($jenis_tugas == 'tugas_besar') {
            $data = [
                'title' => 'Tugas Besar',
                'query' => $this->tugas_model->getAllTugasBesar(),
                'page_header' => 'Tugas Besar',
            ];
        } else {
            $data = [
                'title' => 'Semua Tugas',
                'query' => $this->tugas_model->getAlltugas(),
                'page_header' => 'Semua Tugas',
            ];
        }

        return view('tugas/index', $data);
    }

    public function saya($jenis_tugas = 0)
    {
        if ($jenis_tugas == 'ilmiah') {
            $data = [
                'title' => 'Ilmiah Saya',
                'query' => $this->tugas_model->getMyIlmiah(),
                'page_header' => 'Daftar Ilmiah Saya',
                'stase' => $this->stase_model->getAllStase()
            ];
        } elseif ($jenis_tugas == 'tugas_besar') {
            $data = [
                'title' => 'Tugas Besar Saya',
                'query' => $this->tugas_model->getMyTugasBesar(),
                'page_header' => 'Tugas Besar Saya',
                'stase' => $this->stase_model->getAllStase()
            ];
        } else {
            $data = [
                'title' => 'Tugas Saya',
                'query' => $this->tugas_model->getMyTugas(),
                'page_header' => 'Daftar Semua Tugas Saya',
                'stase' => $this->stase_model->getAllStase()
            ];
        }
        return view('tugas/index', $data);
    }

    public function tambah($jenis_tugas = 0)
    {
        if ($jenis_tugas == 'ilmiah') {
            $data = [
                'title' => 'Tambah Tugas',
                'page_header' => 'Ilmiah',
                'validation' => \Config\Services::validation(),
                'kategori' => $this->kategori_model->getAllKategories(),
            ];
        } elseif ($jenis_tugas == 'tugas_besar') {
            $data = [
                'title' => 'Tambah Tugas',
                'page_header' => 'Tugas Besar',
                'validation' => \Config\Services::validation(),
                // 'kategori' => $this->kategori_model->getAllKategories(),
                'penguji' => $this->spv_model->getAllSpv(),
            ];
        }

        return view('tugas/tambah', $data);
    }

    public function post()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'judul tugas wajib diisi'
                ]
            ],
            'deskripsi' => [
                'rules' => ['required'],
                // |mime_in[photo,image/jpg,image/png]'
                'errors' => [
                    'required' => 'deskripsi wajib diisi'
                ]
            ],
            'id_kategori' => [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'kategori wajib diisi',
                ]
            ],
            // 'file' => [
            //     'rules' => ['required'],
            //     'errors' => [
            //         'required' => 'file tugas wajib diisi',
            //     ]
            // ],
            'jadwal_sidang' => [
                'rules' => ['required'],
                'errors' => [
                    'required' => 'jadwal sidang wajib diisi',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $file = $this->request->getFile('file');
        $encrypted_file_name = $file->getRandomName();
        $file->move('ppds_tugas', $encrypted_file_name);

        $penguji = $this->request->getVar('penguji');
        $id_kategori = $this->request->getVar('id_kategori');

        $data = [
            'id_ppds' => session('user_id'),
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'file' => $encrypted_file_name,
            'jadwal_sidang' => $this->request->getVar('jadwal_sidang'),
            'id_penguji_1' => $id_kategori == 2 ? $penguji[0] : '',
            'id_penguji_2' => $id_kategori == 2 ? $penguji[1] : '',
            'id_stase' => $this->stase_ppds_model->getCurrentUserStase()
        ];

        $result = $this->tugas_model->insert($data);

        if ($id_kategori == 2) {
            $url = base_url('/tugas/index/tugas_besar');
        } elseif ($id_kategori != 2) {
            $url = base_url('/tugas/index/ilmiah');
        }

        if ($result) {
            return redirect()->to($url)->with('success', 'Tugas berhasil diunggah!');
        } else {
            return redirect()->to($url)->with('danger', 'terjadi kesalahan saat mengunggah tugas!');
        }
    }

    public function delete($id_tugas)
    {
        $data_tugas = $this->tugas_model->getSpecificTugas($id_tugas);
        if ($data_tugas['id_ppds'] == session('user_id')) {
            $result = $this->tugas_model->delete($id_tugas);
            if ($result) {
                return redirect()->to(base_url('/tugas/index'))->with('success', 'Tugas berhasil dihapus!');
            }
        } else {
            return redirect()->to(base_url('/tugas/index'))->with('danger', 'Anda tidak punya hak untuk menghapus file ini!');
        }
    }

    public function detail($id_tugas)
    {
        $data = [
            'title' => 'Ilmiah',
            'page_header' => 'Detail Ilmiah',
            'tugas' => $this->tugas_model->detailTugas($id_tugas),
        ];
        return view('tugas/detail', $data);
    }

    public function edit($id_tugas = 0)
    {
        $data = [
            'title' => 'Daftar Tugas',
            'page_header' => 'Daftar Tugas',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategori_model->getAllKategories(),
            'data_tugas' => $this->tugas_model->getSpecificTugas($id_tugas),
        ];
        return view('/tugas/edit', $data);
    }

    public function update()
    {
        dd($this->request->getVar(), $this->request->getFile('file'));
    }
}
