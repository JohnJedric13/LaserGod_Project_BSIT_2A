<?php

namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\Controller;

class Student extends BaseController
{
    public function index()
    {
        $model = new StudentModel();
        $data['student'] = $model->findAll();

        return view('student/index', $data);
    }

    public function create()
    {
        return view('student/create');
    }

    public function store()
    {
        $model = new StudentModel();
        
        $data = [
            'fullname' => $this->request->getPost('fullname'),
            'email' => $this->request->getPost('email'),
            'schoolyear' => $this->request->getPost('schoolyear'),
            'birthday' => $this->request->getPost('birthday'),
            'address' => $this->request->getPost('address'),
        ];
        $model->save($data);
        return redirect()->to(base_url('student'));
    }

    public function edit($id)
    {
        $model = new StudentModel();
        $data['student'] = $model->find($id);

        return view('student/edit', $data);
    }

    public function update($id)
    {
        $model = new StudentModel();

        $model->update($id, [
            'fullname' => $this->request->getPost('fullname'),
            'email' => $this->request->getPost('email'),
            'schoolyear' => $this->request->getPost('schoolyear'),
            'birthday' => $this->request->getPost('birthday'),
            'address' => $this->request->getPost('address'),
        ]);

        return redirect()->to('student');
    }

    public function delete($id)
    {
        $model = new StudentModel();
        $model->delete($id);

        return redirect()->to('student');
    }
}
