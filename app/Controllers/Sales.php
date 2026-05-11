<?php

namespace App\Controllers;

use App\Models\SaleModel;
use CodeIgniter\Controller;

class Sales extends BaseController
{
    public function index()
    {
        $model = new SaleModel();
        $data['sales'] = $model->findAll();

        return view('sale/index', $data);
    }

    public function delete($id)
    {
        $model = new SaleModel();
        $model->delete($id);

        return redirect()->to('sale');
    }

}
