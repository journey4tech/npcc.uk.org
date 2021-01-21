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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// setting route for admin
$route['control-system'] = 'control-system' . '/admin';

//$route['ads/(:num)/(:any)'] = 'ads/detail/$1-$2';

$route['ads/(:any)'] = 'ads/detail/$1';

//$route['jobs/(:num)/(:any)'] = 'jobs/job_detail/$1/$2';


//auth routes
$route['logout'] = 'auth_controller/logout';
$route['login'] = 'auth_controller/login';
$route['register'] = 'auth_controller/register';
$route['forgot-password'] = 'auth_controller/forgot_password';
$route['reset-password'] = 'auth_controller/reset_password';
$route['confirm'] = 'auth_controller/confirm_email';
$route['connect-with-facebook'] = 'auth_controller/connect_with_facebook';
$route['facebook-callback'] = 'auth_controller/facebook_callback';
$route['connect-with-google'] = 'auth_controller/connect_with_google';


//profile routes
$route['profile/(:any)'] = 'profile_controller/profile/$1';
$route['favorites/(:any)'] = 'profile_controller/favorites/$1';
$route['favorites'] = 'home_controller/guest_favorites/$1';
$route['followers/(:any)'] = 'profile_controller/followers/$1';
$route['following/(:any)'] = 'profile_controller/following/$1';
$route['reviews/(:any)'] = 'profile_controller/reviews/$1';
/*settings*/
$route['settings'] = 'profile_controller/update_profile';
$route['settings/update-profile'] = 'profile_controller/update_profile';
$route['settings/shop-settings'] = 'profile_controller/shop_settings';
$route['settings/contact-informations'] = 'profile_controller/contact_informations';
$route['settings/social-media'] = 'profile_controller/social_media';
$route['settings/change-password'] = 'profile_controller/change_password';
$route['settings/shipping-address'] = 'profile_controller/shipping_address';

//ads 
$route['add-ads'] = 'ads/add_ads';
$route['browse-ads'] = 'ads/browse_ads';

//page
$route['about-us'] = 'home/about_us';
$route['campagin'] = 'home/campagin';
