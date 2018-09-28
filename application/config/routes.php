<?php defined('BASEPATH') OR exit('No direct script access allowed');

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



$route['default_controller']   = 'welcome';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;



//FRONT END
$route['index']      				  = 'welcome/index';
$route['about']      				  = 'welcome/about';
$route['services']   				   = 'welcome/services';
$route['privacy']   				    = 'welcome/privacy';
$route['panel-of-experts']  		   = 'welcome/expertpanel';
$route['contact']    				= 'welcome/contact';
$route['login']      				  = 'welcome/login';
$route['register']      			   = 'welcome/register';
$route['logout']      				 = 'welcome/logout';
$route['profile']      				= 'welcome/profile';
$route['forgot']      				 = 'welcome/forgot';


$route['counseller/registration']    = 'counseller/registration';
$route['counseller/login']           = 'counseller/login';
$route['counseller/logout']          = 'counseller/logout';
//$route['counseller/login']           = 'counseller/login';

$route['fest_login']      			 = 'welcome/fest_login';


$route['my_account']    			 = 'welcome/my_account';
$route['counseller_dashboard']       = 'counseller/counseller_dashboard';
$route['askme']      				  = 'welcome/askme';
$route['aptitude']  			       = 'error/cli/error_404';
$route['career-aptitude-test']       = 'aptitude';
$route['personality-test']           = 'personality';
$route['counseling-session']         = 'counseling';
$route['invoice']                    = 'invoice';
$route['apply']                      = 'welcome/apply';
//$route['aptitude2']   = 'aptitude2';


/*
	
	$route['pc'] = 'pc/index';
	$route['pc/(:any)/(:any)/(:any)'] = 'pc/index/$1/$2/$3';
	$route['pc/(:any)/(:any)/(:any)/(:any)'] = 'pc/index/$1/$2/$3/$4';
	$route['pc/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'pc/index/$1/$2/$3/$4/$5';
*/


//ADMIN 
$route['admin']               = 'admin/login';
$route['admin/dashboard']     = 'admin/admin/dashboard';
$route['admin/users']         = 'admin/admin/users';
$route['admin/sms']           = 'admin/admin/sms';
$route['admin/banner']        = 'admin/admin/banner';

$route['admin/stream']        = 'admin/stream';
$route['admin/paper/(:num)']  = 'admin/paper/index/$1';
$route['admin/branch/(:num)'] = 'admin/branch/index/$1';
$route['admin/invoice/(:num)'] = 'admin/report/index/$1';




//$route['admin/childcategories/(:num)']            = 'admin/childcategories/index/$1';
//$route['admin/subchildcategories/(:num)/(:num)']  = 'admin/subchildcategories/index/$1/$2';
//$route['admin/products/(:num)/(:num)/(:num)']     = 'admin/products/index/$1/$2/$3';

$route['admin/logout']      = 'admin/logout';
$route['admin/auth']        = 'admin/auth/index';
$route['admin/auth/login']  = 'admin/auth/login';



