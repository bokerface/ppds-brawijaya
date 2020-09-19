<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;

class KategoriModel extends Model
{
    protected $db;
    protected $builder;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('kategori');
    }

    public function getAllKategories()
    {
        // return $this->builder->getWhere(['id !=' => 2])->getResultArray();
    }

    public function getAllIlmiahKategories()
    {
        return $this->builder->getWhere(['jenis_tugas' => 1])->getResultArray();
    }

    public function getAllTugasBesarKategories()
    {
        return $this->builder->getWhere(['jenis_tugas' => 2])->getResultArray();
        // $this->builder->select('*');
        // $this->builder->whereNotIn();
        // $this->builder->orWhereNotIn('id', function (BaseBuilder $builder) {
        //     return $builder->select('id_kategori')->from('tugas')->where('id_ppds', session('user_id'));
        // });
    }
}
