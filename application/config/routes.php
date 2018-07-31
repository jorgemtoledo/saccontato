<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "dashboard";

$route['users/(:num)'] = "users/index/$1";

$route['clients/(:num)'] = "clients/index/$1";

$route['motorcycles/(:num)'] = "motorcycles/index/$1";

$route['ambulances/(:num)'] = "ambulances/index/$1";

$route['treatments/(:num)'] = "treatments/index/$1";

$route['treatments/listsac/(:num)'] = "treatments/listsac/index/$1";

$route['treatments/listrnc/(:num)'] = "treatments/listrnc/index/$1";

$route['treatments/listrncreturn/(:num)'] = "treatments/listrncreturn/index/$1";

$route['indications/(:num)'] = "indications/index/$1";


$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */