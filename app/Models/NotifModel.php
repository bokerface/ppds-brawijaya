<?php

namespace App\Models;

use Codeigniter\Database\ConnectionInterface;
use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class NotifModel extends Model
{
    protected $table = 'notif';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_ppds',
        'id_admin',
        'tanggal_notif',
        'isi',
    ];
}
