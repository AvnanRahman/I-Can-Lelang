<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');



$routes->get('/account', 'User::account');
$routes->get('/account/(:segment)', 'User::editAccount/$1');

$routes->get('/riwayat', 'User::riwayat');
$routes->get('/riwayat/(:segment)', 'User::detail/$1');

$routes->get('/faq', 'Pages::faq');
$routes->get('/product/(:num)', 'Pages::pdDetail/$1');

$routes->get('add-product', 'BidOrderC::jualpages');
$routes->post('insert-product', 'BidOrderC::insertBid');
$routes->get('checkout/(:num)', 'TransactionC::checkout/$1');
// $routes->post('checkout/insert-transaction', 'TransactionC::insertTransaction');

// $routes->get('/dashboard', 'Admin::dashboard');
// $routes->get('/detail/(:num)', 'Admin::detailProduct/$1');
// Dashboard admin route
$routes->get('/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/dashboard/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/detail/(:num)', 'Admin::detailProduct/$1', ['filter' => 'role:admin']);
$routes->get('/pertanyaan', 'Admin::pertanyaan', ['filter' => 'role:admin']);
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
