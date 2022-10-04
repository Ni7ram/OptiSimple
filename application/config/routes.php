<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// AUTH
$route['logout'] = 'auth/logout';
$route['login'] = 'auth/login';
$route['create_user'] = 'auth/create_user';

// API
$route['api/optica'] = 'api/optica';
$route['api/cliente/json/$1'] = 'api/cliente/json/$1';
$route['api/cliente/html/$1'] = 'api/cliente/html/$1';
$route['api/backup'] = 'api/backup_download';
$route['api/save_note'] = 'api/save_note';
$route['api/backup/html'] = 'api/backup_html';

// CLIENTES
$route['clientes/agregar'] = 'clientes/add';
$route['clientes/buscar/(:any)'] = 'clientes/searchClient/$1';
$route['clientes/buscar'] = 'clientes/searchClient/';
$route['clientes/editar/(:any)'] = 'clientes/edit/$1';
$route['clientes/borrar/(:any)'] = 'clientes/delete/$1';
$route['clientes/(:any)'] = 'clientes/index/$1';
$route['clientes/historial/(:any)'] = 'clientes/historial/$1';
$route['clientes'] = 'clientes';

// ORDENES
$route['ordenes/crear'] = 'ordenes/create';
$route['ordenes/borrar/(:any)'] = 'ordenes/delete/$1';
$route['ordenes/(:any)'] = 'ordenes/view/$1';

// PAGES
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';

//404
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;