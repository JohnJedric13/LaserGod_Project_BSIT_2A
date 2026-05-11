<?php

namespace App\Controllers;

use App\Models\StockModel;
use App\Models\SaleModel;
use App\Models\SaleItemModel;

class Pos extends BaseController
{
    public function index()
    {
        $stockModel = new StockModel();
        $data['stocks'] = $stockModel->findAll();

        return view('pos/index', $data);
    }

    public function checkout()
    {
        $saleModel = new SaleModel();
        $saleItemModel = new SaleItemModel();
        $stockModel = new StockModel();

        $stocks = $this->request->getPost('stocks');
        $quantities = $this->request->getPost('quantities');

        $total = 0;

        // Calculate total
        foreach ($stocks as $i => $product_id) {
            $stock = $stockModel->find($product_id);
            $qty = $quantities[$i];
            $total += $stock['price'] * $qty;
        }

        // Save sale
        $sale_id = $saleModel->insert(['total' => $total]);

        // Save items + update stock
        foreach ($stocks as $i => $product_id) {
            $stock = $stockModel->find($product_id);
            $qty = $quantities[$i];
            $subtotal = $stock['price'] * $qty;

            $saleItemModel->save([
                'sale_id'   => $sale_id,
                'product_id'=> $product_id,
                'quantity'  => $qty,
                'price'     => $stock['price'],
                'subtotal'  => $subtotal
            ]);

            // Deduct stock
            $stockModel->update($product_id, [
                'quantity' => $stock['quantity'] - $qty
            ]);
        }

        return redirect()->to('/pos');
    }

    public function dashboard()
    {
    $saleModel = new \App\Models\SaleModel();

    // Total earnings
    $totalEarnings = $saleModel
        ->selectSum('total')
        ->first();

    // Today's earnings
    $todayEarnings = $saleModel
        ->selectSum('total')
        ->where('DATE(created_at)', date('Y-m-d'))
        ->first();

    // Total transactions
    $totalTransactions = $saleModel->countAll();

    // Today's transactions
    $todayTransactions = $saleModel
        ->where('DATE(created_at)', date('Y-m-d'))
        ->countAllResults();

    $data = [
        'totalEarnings'     => $totalEarnings['total'] ?? 0,
        'todayEarnings'     => $todayEarnings['total'] ?? 0,
        'totalTransactions' => $totalTransactions,
        'todayTransactions' => $todayTransactions
    ];

    return view('pos2/dashboard', $data);
    }
}