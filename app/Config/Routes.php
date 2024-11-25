<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
 $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Home page
$routes->get('/', 'HomeController::index');
$routes->post('search-drivers', 'HomeController::ajax_post');

//Search list
$routes->get('find', 'FindController::index');

// Driver post list
$routes->get('post-trip', 'TripController::index');
$routes->post('save-trip', 'TripController::save_trip');

// Detail
$routes->get('detail', 'DetailController::index');
$routes->get('detail/(:num)', 'DetailController::index/$1');
//$routes->post('detail', 'TripController::save_trip');

// Request
$routes->get('request', 'RequestController::index');

// login-register
$routes->get('login', 'LoginController::login');
$routes->get('auth/google', 'LoginController::google');
$routes->get('auth/callback', 'LoginController::callback');

$routes->get('signup', 'RegisterController::index');
$routes->get('forget', 'RegisterController::forget');
$routes->post('forgot-password', 'RegisterController::forgotPassword');

// Email/password login route
$routes->post('login/email', 'LoginController::loginWithEmail');
// Email/password registration route
$routes->post('signup/email', 'RegisterController::registerWithEmail');

//reset-password
$routes->get('/reset-password', 'RegisterController::resetPassword');
$routes->post('/reset-password', 'RegisterController::updatePassword');


//user profile
$routes->get('profile', 'UserController::index');
$routes->get('/logout', 'UserController::logout');


//search form by code
$routes->get('validatethecode', 'SearchController::validatethecode');
$routes->post('validatethecode', 'SearchController::validatethecode');

//activate
$routes->get('activate', 'ActivateController::index');
$routes->post('verification', 'ActivateController::email_verifyer');


//Email
//$routes->get('send-email', 'EmailController::sendEmail');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
