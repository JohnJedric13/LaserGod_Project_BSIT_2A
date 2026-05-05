<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
    protected $table = 'stocks';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'product',
        'quantity',
        'price',
        'expire',
        'category_id'
    ];

    public function getProductsWithCategory()
    {
        return $this->select('stocks.*, categories.name as category_name')
                    ->join('categories', 'categories.category_id = stocks.category_id')
                    ->findAll();
    }

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
