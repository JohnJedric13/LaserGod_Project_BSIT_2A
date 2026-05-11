<?php

namespace App\Models;
use CodeIgniter\Model;

class SaleModel extends Model
{
    protected $table = 'sales';
    protected $allowedFields = ['id', 'total', 'created_at'];
}