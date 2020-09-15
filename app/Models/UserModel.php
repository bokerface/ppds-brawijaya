<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // protected $table = 'ci_users';
    protected $allowedFields = ['username', 'email', 'password', 'role', 'spv', 'nama_lengkap', 'photo'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('ci_users');
    }

    public function getUserById($id_user)
    {
        $query = $this->builder->getWhere(['id' => $id_user])->getRowObject();
        return $query;
    }

    public function getAll()
    {
        $this->builder->select('*,role.role as nama_role,ci_users.id as id_ppds');
        $this->builder->join('role', 'role.id = ci_users.role');
        $query = $this->builder->get()->getResultArray();
        return $query;
    }

    public function getSpv()
    {
        $query = $this->builder->getWhere(['role' => 3])->getResultArray();
        return $query;
    }

    public function getCurrentUserData()
    {
        $id_user = session('user_id');
        $this->builder->select('*');
        $this->builder->join('stase_ppds', 'stase_ppds.id_user = ci_users.id');
        $this->builder->join('stase', 'stase.id = stase_ppds.id_stase');
        $this->builder->where('ci_users.id', $id_user);
        $query = $this->builder->get()->getRowObject();
        return $query;
    }

    public function getPpds()
    {
        // return $this->builder->getWhere(['role' => 4])->getResultArray();
        $this->builder->select('*,ci_users.id as id_ppds,stase.stase as nama_stase');
        $this->builder->join('stase_ppds', 'stase_ppds.id_user = ci_users.id');
        $this->builder->join('stase', 'stase.id = stase_ppds.id_stase');
        // $this->builder->join('tahap_ppds', 'tahap_ppds.id_user = ci_users.id');
        // $this->builder->join('tahap', 'tahap.id = tahap_ppds.id_tahap');
        $this->builder->where('ci_users.role', 4);
        $query = $this->builder->get()->getResultArray();
        return $query;
    }
}
