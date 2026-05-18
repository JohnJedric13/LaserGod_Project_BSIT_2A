<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplyModel extends Model
{
    protected $table = 'supplies';

    protected $allowedFields = [
        'supplier_name',
        'total_items'
    ];

}