<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Login extends BaseController
{
    protected $auth_model;
    public function __construct()
    {
        $this->auth_model = new AuthModel();
    }

    public function view()
    {
        return view('login');
    }

    public function login()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = [
            'username' => $username,
            'password' => $password,
        ];

        $result = $this->auth_model->login($data);

        if ($result) {
            $user_data = [
                'user_id' => $result['id'],
                'user_name' => $result['username'],
                'role' => $result['role'],
            ];
            $session->set($user_data);
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('warning', 'Invalid username or password');
        }
        // dd($result);
    }

    //--------------------------------------------------------------------

}
