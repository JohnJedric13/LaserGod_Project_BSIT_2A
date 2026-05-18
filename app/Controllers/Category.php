<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\Controller;

class Category extends BaseController
{
    public function index()
    {
        $model = new CategoryModel();
        $data['categories'] = $model->findAll();

        return view('category/index', $data);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();

        return view('category/create', $data);
    }

    public function store()
    {
        $model = new CategoryModel();
        
        $data = [
            'name' => $this->request->getPost('name')
        ];
        $model->save($data);
        return redirect()->to(base_url('category'))->with('success', 'New Category Added');
    }

    public function delete($id)
    {
        $model = new CategoryModel();
        $model->delete($id);

        return redirect()->to('category');
    }
}
