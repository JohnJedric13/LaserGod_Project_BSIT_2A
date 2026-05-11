<?php

namespace App\Controllers;

use App\Models\StockModel;
use App\Models\CategoryModel;
use CodeIgniter\Controller;

class Stock extends BaseController
{
    public function index()
    {
        $model = new StockModel();
        $categoryModel = new CategoryModel();

        $data['stocks'] = $model->findAll();
        $data['stocks'] = $model->getProductsWithCategory();
        $data['categories'] = $categoryModel->findAll();

        return view('stock/index', $data);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();

        $data['categories'] = $categoryModel->findAll();

        return view('stock/create', $data);
    }

    public function store()
    {
        $model = new StockModel();
        
        $data = [
            'product' => $this->request->getPost('product'),
            'quantity' => $this->request->getPost('quantity'),
            'price' => $this->request->getPost('price'),
            'expire' => $this->request->getPost('expire'),
            'created_at' => $this->request->getPost('created_at'),
            'category_id' => $this->request->getPost('category_id')
        ];
        $model->save($data);
        return redirect()->to(base_url('stock'));
    }

    public function edit($id)
    {
        $model = new StockModel();
        $categoryModel = new CategoryModel();

        $data['stocks'] = $model->find($id);
        $data['categories'] = $categoryModel->findAll();

        return view('stock/edit', $data);
    }

    public function update($id)
    {
        $model = new StockModel();

        $categoryModel = new CategoryModel();
        //$data['categories'] = $categoryModel->findAll();

        $model->update($id, [
            'product' => $this->request->getPost('product'),
            'quantity' => $this->request->getPost('quantity'),
            'price' => $this->request->getPost('price'),
            'expire' => $this->request->getPost('expire'),
            'category_id' => $this->request->getPost('category_id'),
        ]);

        return redirect()->to('stock');
    }

    public function delete($id)
    {
        $model = new StockModel();
        $model->delete($id);

        return redirect()->to('stock');
    }
}
