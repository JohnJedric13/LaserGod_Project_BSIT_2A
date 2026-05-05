<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class User extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['user'] = $model->findAll();

        return view('user/index', $data);
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);

        return redirect()->to('user');
    }
}