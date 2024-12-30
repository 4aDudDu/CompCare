<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');  
$routes->post('pages/issueDevice', 'Pages::issueDeviceAjax');
$routes->get('login', '\Myth\Auth\Controllers\AuthController::login', ['as' => 'login']);
$routes->get('logout', '\Myth\Auth\Controllers\AuthController::logout');
$routes->get('/pages/store', 'Store::index'); 
$routes->post('/store/addProduct', 'Store::addProduct'); 
$routes->get('register', '\Myth\Auth\Controllers\AuthController::register');
$routes->get('/pages/product', 'Pages::product');
$routes->post('/pages/product/update/(:num)', 'Pages::updateProduct/$1');
$routes->post('/pages/product/delete/(:num)', 'Pages::deleteProduct/$1');
$routes->get('/pages/edit_product/(:num)', 'Pages::editProduct/$1');
$routes->post('/pages/edit_product/(:num)', 'Pages::updateProduct/$1');







    