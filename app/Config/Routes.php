<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/dashboard', 'Dashboard::index');

//Crud Students
$routes->get('student', 'Student::index');
$routes->get('student/create', 'Student::create');
$routes->post('student/store', 'Student::store');
$routes->get('student/edit/(:num)', 'Student::edit/$1');
$routes->post('student/update/(:num)', 'Student::update/$1');
$routes->get('student/delete/(:num)', 'Student::delete/$1');

$routes->post('student', 'Student::index');
$routes->post('stock', 'Stock::index');
$routes->get('/login', 'Student::login');
$routes->get('/register', 'Register::index');
$routes->post('/login', 'Login::login');

//Crud Stock
$routes->get('stock', 'Stock::index');
$routes->get('stock/create', 'Stock::create');
$routes->post('stock/store', 'Stock::store');
$routes->get('stock/edit/(:num)', 'Stock::edit/$1');
$routes->post('stock/update/(:num)', 'Stock::update/$1');
$routes->get('stock/delete/(:num)', 'Stock::delete/$1');
