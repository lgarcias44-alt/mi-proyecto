<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('bienvenida', 'Home::bienvenida');

$routes->match(['get', 'post'], 'register', 'Home::register');
$routes->match(['get', 'post'], 'login', 'Home::login');
$routes->get('logout', 'Home::logout');

$routes->get('perfil', 'Home::profile');
$routes->get('confirmPassword', 'Home::confirmPassword');
$routes->get('editProfile', 'Home::editProfile');
$routes->get('cambiarContra', 'Home::cambiarContra');

$routes->match(['get', 'post'], 'editarFoto', 'Home::editarFoto');
$routes->get('eliminarFoto', 'Home::eliminarFoto');

$routes->get('usuarios', 'Usuarios::index');
$routes->get('usuarios/ver/(:num)', 'Usuarios::ver/$1');
$routes->get('usuarios/editar/(:num)', 'Usuarios::editar/$1');
$routes->post('usuarios/actualizar/(:num)', 'Usuarios::actualizar/$1');

$routes->get('tareas', 'Home::tareas');
$routes->get('tareas/nueva', 'Home::nuevaTarea');
$routes->post('tareas/guardar', 'Home::guardarTarea');
$routes->get('tareas/ver/(:num)', 'Home::verTarea/$1');
$routes->get('tareas/editar/(:num)', 'Home::editarTarea/$1');
$routes->post('tareas/actualizar/(:num)', 'Home::actualizarTarea/$1');
$routes->get('tareas/eliminar/(:num)', 'Home::eliminarTarea/$1');
