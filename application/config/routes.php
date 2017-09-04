<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
|
*/

$route['reports'] = 'reports';
$route['users'] = 'users';
$route['subjects'] = 'subjects';
$route['login'] = 'login';
$route['logout'] = 'logout';
$route['default_controller'] = 'home';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
