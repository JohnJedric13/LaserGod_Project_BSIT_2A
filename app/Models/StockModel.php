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
        'expire'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
