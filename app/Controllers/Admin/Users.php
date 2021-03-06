<?php

namespace App\Controllers\Admin;

use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\TahapModel;
use App\Models\SupervisorModel;
use App\Controllers\BaseController;
use App\Models\StasePpdsModel;
use App\Models\StaseModel;
use App\Models\NotifModel;

class Users extends BaseController
{
    protected $user_model;
    protected $role_model;
    protected $tahap_model;
    protected $stase_ppds_model;
    protected $stase_model;
    protected $spv_model;
    protected $notif_model;
    public function __construct()
    {
        $this->user_model = new UserModel();
        $this->role_model = new RoleModel();
        $this->tahap_model = new TahapModel();
        $this->stase_ppds_model = new StasePpdsModel();
        $this->stase_model = new StaseModel();
        $this->spv_model = new SuperVisorModel();
        $this->notif_model = new NotifModel();
    }

    public function view()
    {
        $data['title'] = 'Daftar User';
        $data['query'] = $this->user_model->getAll();
        $data['page_header'] = 'Users list';
        return view('admin/users/index', $data);
    }

    public function show()
    {
        $data = [
            'title' => 'Tambah Pengguna Baru',
            'page_header' => 'Tambah Pengguna Baru',
            'validation' => \Config\Services::validation(),
            'role' => $this->role_model->findAll(),
            'spv' => $this->user_model->getSpv(),
        ];
        return view('admin/users/add', $data);
    }

    public function post()
    {
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $role = $this->request->getVar('role');
        $supervisor = $this->request->getVar('spv');

        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[ci_users.username]',
                'errors' => [
                    'required' => 'username cant be empty',
                    'is_unique' => 'username already taken'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[ci_users.email]',
                'errors' => [
                    'required' => 'email cant be empty',
                    'is_unique' => 'email already taken'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password cant be empty',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'role cant be empty',
                ]
            ],
            // 'spv' => [
            //     'rules' => ['']
            // ]
        ])) {
            // dd(session());

            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'role' => $role,
            'spv' => $supervisor
        ];

        $is_supervisor_exist = $this->spv_model->getSpecificSpv($supervisor);

        if ($is_supervisor_exist) {
            if ($this->user_model->insert($data)) {
                if ($data['role'] == 4) {
                    date_default_timezone_set('Asia/Jakarta');
                    $ppds_id = $this->user_model->getInsertID();
                    $dataForTahap = [
                        'id_user' => $ppds_id,
                        'id_tahap' => 1,
                        'tanggal_mulai' => date("Y-m-d")
                    ];
                    $this->tahap_model->insert($dataForTahap);

                    $dataForStase = [
                        'id_user' => $ppds_id,
                        'id_stase' => 25,
                        'tanggal_mulai' => date("Y-m-d")
                    ];
                    $this->stase_ppds_model->insert($dataForStase);
                    return redirect()->to('/admin/users')->with('success', 'Pengguna baru berhasil ditambahkan!');
                }
                return redirect()->to('/admin/users')->with('success', 'Pengguna baru berhasil ditambahkan!');
            } else {
                return redirect()->back()->with('warning', 'Gagal menambahkan pengguna baru :(');
            }
        } else {
            return redirect()->back()->withInput()->with('danger', 'Data supervisor tidak ditemukan!');
        }
    }

    public function delete($user_id)
    {
        $result = $this->user_model->delete($user_id);
        if ($result) {
            return redirect()->to(base_url('admin/users'))->with('success', 'Pengguna berhasil dihapus!');
        } else {
            return redirect()->to(base_url('admin/users'))->with('danger', 'Terjadi kesalahan saat menghapus data :(');
        }
    }

    public function detail($id_ppds)
    {
        $data = [
            'title' => 'Detail User',
            'page_header' => 'Detail User',
            'data_user' => $this->user_model->getUserById($id_ppds),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/users/detail', $data);
        dd($data);
    }

    public function lobby()
    {
        $data = [
            'title' => 'Lobby PPDS',
            'page_header' => 'Lobby PPDS',
            'query' => $this->user_model->getPpdsWithoutStase(),
        ];

        // dd($data);

        return view('admin/ppds/lobby', $data);
    }

    public function postPpdsStase()
    {
        $data = [
            'id' => $this->request->getVar('id_stase_ppds'),
            'id_stase' => $this->request->getVar('id_stase'),
            'id_user' => $this->request->getVar('id_ppds'),
        ];

        if ($this->stase_ppds_model->changePpdsStase($data)) {
            // $this->notif_model->insert();
            return redirect()->back()->with('success', 'Stase PPDS berhasil diubah');
        }
    }

    public function ppds($id_tahap)
    {
        $data = [
            'title' => 'PPDS',
            'page_header' => 'Daftar PPDS',
            'query' => $this->user_model->getPpdsByTahap($id_tahap),
        ];
        // dd($this->user_model->getPpdsByTahap($id_tahap));
        return view('admin/ppds/index', $data);
    }

    public function detailppds($id_ppds)
    {
        $db = \Config\Database::connect();
        $data = [
            'title' => 'Detail User',
            'page_header' => 'Detail User',
            'ppds' => $this->user_model->getUserById($id_ppds),
            'validation' => \Config\Services::validation(),
            'tahap' => $db->query("SELECT * FROM tahap")->getResultArray(),
        ];

        return view('admin/ppds/detail', $data);
        // dd($data);
    }

    public function staseSelesai()
    {
        $id_ppds = $this->request->getVar('id_ppds');
        $tahap_ppds = $this->tahap_model->getPpdsTahap($id_ppds);
        $jumlah_stase_per_tahap = $this->stase_model->countStasePerTahap($tahap_ppds);
        $jumlah_ppds_stase = $this->stase_ppds_model->countPpdsStaseByTahap($id_ppds, $tahap_ppds);

        if ($this->user_model->staseSelesai($id_ppds)) {
            date_default_timezone_set('Asia/Jakarta');
            $dataForStase = [
                'id_user' => $id_ppds,
                'id_stase' => 25,
                'tanggal_mulai' => date("Y-m-d")
            ];

            if ($jumlah_ppds_stase == $jumlah_stase_per_tahap) {
                $dataForTahap = [
                    'id_user' => $id_ppds,
                    'id_tahap' => $tahap_ppds + 1,
                    'tanggal_mulai' => date("Y-m-d")
                ];
                $this->tahap_model->insert($dataForTahap);
                $this->stase_ppds_model->insert($dataForStase);
                return redirect()->to(base_url('/admin/ppds/lobby'))->with('success', 'PPDS telah menyelesaikan stase');
            } else {
                $this->stase_ppds_model->insert($dataForStase);
                return redirect()->to(base_url('/admin/ppds/lobby'))->with('success', 'PPDS telah menyelesaikan stase');
            }
        }
    }
}
