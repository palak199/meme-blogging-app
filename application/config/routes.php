<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['posts']='posts/index';
$route['posts/create']='posts/create';
$route['posts/update']='posts/update';
$route['posts/like']='posts/like';
$route['posts/(:any)']='posts/view/$1';
$route['categories/create']='categories/create';
$route['categories']='categories/index';
$route['categories/posts/(:any)']='categories/posts/$1';
$route['(:any)']='pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;