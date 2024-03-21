<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

$route['default_controller'] = 'Main_controller';
$route['dashboard'] = 'Main_controller/dashboard';


// Auth Routes
$route['login'] = 'Auth_Controller/login';
$route['logout'] = 'Auth_Controller/logout';
$route['authenticate_driver'] = 'Auth_Controller/login_auth';
$route['register'] = 'Auth_Controller/register';
$route['driver_app_auth/(:any)'] = 'Auth_Controller/app_login/$1';
$route['app_auth'] = 'Auth_Controller/app_auth';

// Driver Routes
$route['drivers'] = 'Driver_Controller/index';
$route['driver_main_content'] = 'Driver_Controller/get_content';
$route['driver_details/(:any)'] = 'Driver_Controller/driver_details/$1';
$route['driver/get_jobs'] = 'Driver_Controller/get_jobs';
$route['driver_details_modal'] = 'Driver_Controller/driver_details_modal';

// Request Routes
$route['requests'] = 'Request_Controller/index';
$route['request_main_content'] = 'Request_Controller/main_content';

// Invitations Routes
$route['invitations'] = 'Invitation_Controller/index';
$route['invitation_main_content'] = 'Payment_Controller/get_content';

// Payments Routes
$route['payments'] = 'Payment_Controller/index';
$route['payment_main_content'] = 'Payment_Controller/main_content';
$route['remove_payment'] = 'Payment_Controller/remove_payment';
$route['schedule_payment'] = 'Payment_Controller/schedule_payment';
$route['transfer_payment'] = 'Payment_Controller/transfer_payment';

// Orders Routes
$route['order_details_modal'] = 'Order_Controller/order_details_modal';


// Misc
$route['404_override'] = 'fallback_controller/not_found_fzf';
$route['translate_uri_dashes'] = FALSE;
