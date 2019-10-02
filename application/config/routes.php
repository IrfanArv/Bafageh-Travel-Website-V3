<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['hotels']='hotel';
$route['hotels/(:any)']='hotel/detail/$1';
$route['default_controller'] = 'home';
$route['404_override'] = 'error';
$route['translate_uri_dashes'] = FALSE; 
