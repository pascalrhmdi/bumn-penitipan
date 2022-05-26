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
$routes->setDefaultNamespace('Myth\Auth\Controllers');
$routes->setDefaultController('AuthController');
$routes->setDefaultMethod('login');
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

$routes->get('create-db', function () {
    $forge = \Config\Database::forge();

    if ($forge->createDatabase('db_tugasakhir_pbw2')) {
        echo 'Database created!';

        $migrate = \Config\Services::migrations();
        $seeder = \Config\Database::seeder();

        try {
            $migrate->latest();
            $seeder->call('MainSeeders');
            echo 'Seed Success';
        } catch (\Throwable $e) {
            $e->getMessage();
        }
    }
});

$routes->get('/', 'AuthController::login', ['as' => 'login']);
$routes->post('/', 'AuthController::attemptLogin');

$routes->group('admin', ['namespace' => 'App\Controllers'], static function ($routes) {
    $routes->get('', 'Admin::index');

    $routes->resource('umkm', ['placeholder' => '(:num)']);
});

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