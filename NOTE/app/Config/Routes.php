<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::showDashboard');
$routes->get('/form','Home::showForm');
$routes->get('/list','Home::showList');

