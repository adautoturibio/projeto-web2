<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('usuario');
// $routes->setDefaultMethod('index');
// $routes->setTranslateURIDashes(false);
// $routes->set404Override();
// $routes->setAutoRoute(true);



$routes->get('/home', 'Home::index');//rota para chamar o metodo index; a ideia e colocar o local http://localhost:8080/home
$routes->get('/usuario', 'Usuario::index');
$routes->get('/sobre', 'Usuario::sobre');