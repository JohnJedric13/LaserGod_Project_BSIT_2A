<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/dashboard', 'Dashboard::index');

//Users
$routes->get('user', 'User::index');
$routes->get('user/delete/(:num)', 'User::delete/$1');


//Crud Students
$routes->get('student', 'Student::index');
$routes->get('student/create', 'Student::create');
$routes->post('student/store', 'Student::store');
$routes->get('student/edit/(:num)', 'Student::edit/$1');
$routes->post('student/update/(:num)', 'Student::update/$1');
$routes->get('student/delete/(:num)', 'Student::delete/$1');

//$routes->post('student', 'Student::index');
$routes->post('stock', 'Stock::index');
$routes->post('login', 'Auth::login');

// Login and Register
$routes->get('/register', 'Auth::register');
$routes->post('/save', 'Auth::save');

$routes->get('/login', 'Auth::login');
$routes->post('/auth', 'Auth::auth');

$routes->get('/logout', 'Auth::logout');

//Crud Stock
$routes->get('stock', 'Stock::index');
$routes->get('stock/create', 'Stock::create');
$routes->post('stock/store', 'Stock::store');
$routes->get('stock/edit/(:num)', 'Stock::edit/$1');
$routes->post('stock/update/(:num)', 'Stock::update/$1');
$routes->get('stock/delete/(:num)', 'Stock::delete/$1');

//Crud Category
$routes->get('category', 'Category::index');
$routes->get('category/create', 'Category::create');
$routes->post('category/store', 'Category::store');
$routes->get('category/delete/(:num)', 'Category::delete/$1');

//Pos
$routes->get('/pos', 'Pos::index');
$routes->get('/pos2/dashboard', 'Pos::dashboard');
$routes->post('/pos/checkout', 'Pos::checkout');
$routes->get('/sale', 'Sales::index');
$routes->get('/sale/delete/(:num)', 'Sale::delete/$1');

//Supply
$routes->get('/supplies', 'SupplyController::index');
$routes->post('/supplies/save', 'SupplyController::save');