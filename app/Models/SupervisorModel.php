<?php

namespace App\Models;

use CodeIgniter\Model;

class SupervisorModel extends Model
{
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('ci_users');
    }

    public function getAllSpv()
    {
        return $this->builder->getWhere(['role' => 3])->getResultArray();
    }
}
