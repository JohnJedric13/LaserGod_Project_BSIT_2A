<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        return view('register');
    }

    public function save()
    {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'role'    => $this->request->getPost('role'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $model->save($data);

        return redirect()->to('/login')->with('success', 'Registered successfully');
    }

    public function login()
    {
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();
       

        if ($user) {
            if (password_verify($password, $user['password'])) {

                $sessionData = [
                    'user_id' => $user['user_id'],
                    'username' => $user['username'],
                    'isLoggedIn' => true
                ];

                $session->set($sessionData);
                return redirect()->to('dashboard');

            } else {
                return redirect()->back()->with('error', 'Wrong password');
            }
        } 
        else {
            return redirect()->back()->with('error', 'Email not found');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}