<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::form');
$routes->get('/login', 'AuthController::form');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'Home::showDashboard', ['filter' => 'role:admin']);
$routes->get('/form','Home::showForm', ['filter' => 'auth']);
$routes->get('/list','Home::showList', ['filter' => 'auth']);

