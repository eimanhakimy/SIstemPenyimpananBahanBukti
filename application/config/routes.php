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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['department/add'] = 'department/add';
$route['category/addCategory'] = 'user/addCategory';
$route['category/addCategory_action'] = 'user/addCategory_action';
$route['category/edit/(:any)'] = 'user/editCategory/$1';
$route['category/delete/(:any)'] = 'user/deleteCategory/$1';
$route['category/printCategory'] = 'user/printCategory';


//anggota 

$route['anggota/printAnggota'] = 'user/printAnggota';
$route['anggota/addAnggota'] = 'user/addAnggota';
$route['anggota/addAnggota_action'] = 'user/addAnggota_action';
$route['anggota/edit/(:any)'] = 'user/editAnggota/$1';

//bahan bukti

$route['bahanbukti/addBahanBukti'] = 'user/addBahanBukti';
$route['bahanbukti/addBahanBukti_action'] = 'user/addBahanBukti_action';

//rack

$route['rack/addRack'] = 'user/addRack';
$route['rack/addRack_action'] = 'user/addRack_action';
$route['rack/edit/(:any)'] = 'user/editRack/$1';
$route['rack/delete/(:any)'] = 'user/deleteRack/$1';
$route['rack/printRack'] = 'user/printRack';


//akaun staf
$route['staff/addStaff'] = 'admin/addStaff';
$route['staff/addStaff_action'] = 'admin/addStaff_action';







