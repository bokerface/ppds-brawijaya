<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    protected $user_model;
    public function __construct()
    {
        $this->user_model = new UserModel();
    }

    public function index()
    {
        $data['query'] = $this->user_model->findAll();
        $data['page_header'] = 'Users list';
        return view('/users/index', $data);
    }

    public function add_new_user()
    {
        $data['page_header'] = 'Add new user';
        return view('/users/add', $data);
    }

    public function post()
    {
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $role = $this->request->getVar('role');

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'role' => $role
        ];

        $result = $this->user_model->insert($data);

        if ($result) {
            return redirect()->to('/users')->with('success', 'Successfully added new user!');
        } else {
            // return redirect()->back()->withInput();
            print_r($this->user_model->errors());
        }
    }
}
