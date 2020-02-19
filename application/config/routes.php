<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard/index';
$route['assets/(:any)'] = 'assets/$1';//inportar theme
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
