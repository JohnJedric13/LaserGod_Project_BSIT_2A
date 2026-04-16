<?php

namespace App\Controllers;

use App\Models\StockModel;
use CodeIgniter\Controller;

class Stock extends BaseController
{
    public function index()
    {
        $model = new StockModel();
        $data['stocks'] = $model->findAll();

        return view('stock/index', $data);
    }

    public function create()
    {
        return view('stock/create');
    }

    public function store()
    {
        $model = new StockModel();
        
        $data = [
            'product' => $this->request->getPost('product'),
            'quantity' => $this->request->getPost('quantity'),
            'price' => $this->request->getPost('price'),
            'expire' => $this->request->getPost('expire'),
            'created_at' => $this->request->getPost('created_at')
        ];
        $model->save($data);
        return redirect()->to(base_url('stock'));
    }

    public function edit($id)
    {
        $model = new StockModel();
        $data['stocks'] = $model->find($id);

        return view('stock/edit', $data);
    }

    public function update($id)
    {
        $model = new StockModel();

        $model->update($id, [
            'product' => $this->request->getPost('product'),
            'quantity' => $this->request->getPost('quantity'),
            'price' => $this->request->getPost('price'),
            'expire' => $this->request->getPost('expire'),
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
