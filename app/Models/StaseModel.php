<?php

namespace App\Models;

use CodeIgniter\Model;

class StaseModel extends Model
{
    // protected $table = 'ci_users';
    protected $allowedFields = ['id_user', 'id_stase', 'tanggal_mulai'];
    // protected $useTimestamps = true;
    // protected $createdField  = 'tanggal_mulai';
    // protected $updatedField  = 'updated_at';

    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('stase');
    }

    public function getAllStase()
    {
        return $this->builder->get()->getResultArray();
    }

    // public function getUserById($user_id)
    // {
    //     $query = $this->builder->getWhere(['id' => $user_id])->getRowObject();
    //     return $query;
    // }
}
