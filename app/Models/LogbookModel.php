<?php

namespace App\Models;

use CodeIgniter\Model;

class LogbookModel extends Model
{
    protected $table = 'log_book';
    protected $allowedFields = [
        'id_ppds',
        'waktu',
        'id_supervisor',
        'pasien',
        'jenis_kelamin',
        'usia',
        'rekam_medik',
        'jenis_tindakan'
    ];

    public function getLogbook()
    {
        $db = \Config\Database::connect();

        return $db->query(
            "SELECT *,ci_users.nama_lengkap FROM log_book
            LEFT JOIN ci_users ON ci_users.id = log_book.id_ppds
            "
        )->getResultArray();
    }
}
