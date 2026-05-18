<?php

namespace App\Controllers;

use App\Models\StockModel;
use App\Models\SupplyModel;
use App\Models\SupplyItemModel;

class Supplier extends BaseController
{
    public function index()
    {
        $supplyModel = new SupplyModel();
        $supplyItemModel = new SupplyItemModel();
        $data['supplies'] = $supplyModel->findAll();

        return view('suppliers/index', $data);
    }

    public function delete($id)
    {
        $model = new SupplyModel();
        $model->delete($id);

        return redirect()->to('suppliers');
    }
}