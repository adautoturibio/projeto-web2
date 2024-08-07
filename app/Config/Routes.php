<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/home', 'Produtos::index');
$routes->get('/usuario', 'Usuario::index');
$routes->get('/sobre', 'Usuario::sobre');
$routes->get('/produtos', 'Produtos::index');
$routes->get('/sacola', 'Sacola::index');
