<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplyItemModel extends Model
{
    protected $table = 'supply_items';

    protected $allowedFields = [
        'supply_id',
        'product_id',
        'quantity',
        'cost'
    ];
}