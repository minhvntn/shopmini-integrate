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
|	https://codeigniter.com/user_guide/general/routing.html
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

$route['default_controller'] = 'home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['san-pham'] = 'sanpham/index';
$route['san-pham/(:any)'] = 'sanpham/index/$1';
$route['san-pham-chi-tiet/(:any)'] = 'productdetail/index/$1';
/*admin*/
$route['admin'] = 'user/index';
// $route['admin/signup'] = 'user/signup';
// $route['admin/create_member'] = 'user/create_member';
$route['admin/login'] = 'user/index';
$route['admin/logout'] = 'user/logout';
$route['admin/login/validate_credentials'] = 'user/validate_credentials';

$route['admin/sanpham'] = 'admin_sanpham/index';
$route['admin/sanpham/them'] = 'admin_sanpham/them';
$route['admin/sanpham/capnhat'] = 'admin_sanpham/capnhat';
$route['admin/sanpham/capnhat/(:any)'] = 'admin_sanpham/capnhat/$1';
$route['admin/sanpham/xoa/(:any)'] = 'admin_sanpham/xoa/$1';
$route['admin/sanpham/(:any)'] = 'admin_sanpham/index/$1'; //$1 = page number

$route['admin/danhmuc'] = 'admin_danhmuc/index';
$route['admin/danhmuc/them'] = 'admin_danhmuc/them';
$route['admin/danhmuc/capnhat'] = 'admin_danhmuc/capnhat';
$route['admin/danhmuc/capnhat/(:any)'] = 'admin_danhmuc/capnhat/$1';
$route['admin/danhmuc/xoa/(:any)'] = 'admin_danhmuc/xoa/$1';
$route['admin/danhmuc/(:any)'] = 'admin_danhmuc/index/$1'; //$1 = page number
