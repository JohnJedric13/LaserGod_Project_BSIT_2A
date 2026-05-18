<?php

namespace App\Controllers;

use App\Models\StockModel;
use App\Models\SupplyModel;
use App\Models\SupplyItemModel;

class SupplyItem extends BaseController
{
    public function index()
    {
        $supplyModel = new SupplyModel();
        $supplyItemModel = new SupplyItemModel();
        $data['supply_items'] = $supplyItemModel->findAll();

        return view('supplyitems/index', $data);
    }
}