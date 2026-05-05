<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
     //return view('dashboard'); // create this view later
    
     $db = \Config\Database::connect();

     $query = $db->query('SELECT * FROM stocks');
     $data['stocks'] = $query->getNumRows();

     $query = $db->query('SELECT * FROM users');
     $data['users'] = $query->getNumRows();

     $query = $db->query('SELECT * FROM categories');
     $data['categories'] = $query->getNumRows();

     //$model = new StockModel(); // or your actual model
     //$data['stocks'] = $model->countAll(); // example: total count

     //$model = new UserModel(); // or your actual model
     //$data['users'] = $model->countAll(); // example: total count

     return view('dashboard', $data);
    }
}