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
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('create-db', function() {
    $forge = \Config\Database::forge();
    if ($forge->createDatabase('perawatan_perangkat')) {
        echo 'Database created!';
    }
});

$routes->get('users', 'UsersController::index');
$routes->post('users', 'UsersController::store');
$routes->post('/users/update/(:num)', 'UsersController::update/$1');
$routes->get('assets', 'AssetsController::index');
$routes->post('assets', 'AssetsController::store');
$routes->post('/assets/update/(:num)', 'AssetsController::update/$1');
$routes->get('jenis-perawatan', 'JPerawatanController::index');
$routes->post('jenis-perawatan', 'JPerawatanController::store');
$routes->post('/jenis-perawatan/update/(:num)', 'JPerawatanController::update/$1');
$routes->get('perawatan-perangkat', 'PerawatanController::index');

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
