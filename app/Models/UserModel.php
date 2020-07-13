<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'ci_users';
    protected $allowedFields = ['username', 'email', 'password', 'role'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $validationRules = [
        'username' => 'required',
        'email' => 'required|valid_email|is_unique[ci_users.email]',
        'password' => 'required',
        'role' => 'required|numeric'
    ];
}
