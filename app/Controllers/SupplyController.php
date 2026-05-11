<?php

namespace App\Controllers;

use App\Models\StockModel;
use App\Models\SupplyModel;
use App\Models\SupplyItemModel;

class SupplyController extends BaseController
{
    public function index()
    {
        $stockModel = new StockModel();

        $data['stocks'] = $stockModel->findAll();

        return view('supplies/index', $data);
    }

    public function save()
    {
        $supplyModel = new SupplyModel();
        $supplyItemModel = new SupplyItemModel();
        $stockModel = new StockModel();

        $supplier = $this->request->getPost('supplier_name');

        $productIds = $this->request->getPost('product_id');
        $quantities = $this->request->getPost('quantity');
        $costs = $this->request->getPost('cost');

        $totalItems = array_sum($quantities);

        $supplyModel->insert([
            'supplier_name' => $supplier,
            'total_items' => $totalItems
        ]);

        $supplyId = $supplyModel->insertID();

        foreach ($productIds as $key => $productId) {

            $qty = $quantities[$key];
            $cost = $costs[$key];

            $supplyItemModel->insert([
                'supply_id' => $supplyId,
                'product_id' => $productId,
                'quantity' => $qty,
                'cost' => $cost
            ]);

            $stock = $stockModel->find($productId);

            $newStock = $stock['quantity'] + $qty;

            $stockModel->update($productId, [
                'quantity' => $newStock
            ]);
        }

        return redirect()->to('/supplies')
                         ->with('success', 'Supply Added Successfully');
    }
}