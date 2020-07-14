<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $user_model;
    public function __construct()
    {
        $this->user_model = new UserModel();
    }

    public function profile()
    {
        $user_id = $_SESSION['user_id'];
        $data['query'] = $this->user_model->find($user_id);

        return view('user/profile', $data);
    }
}
