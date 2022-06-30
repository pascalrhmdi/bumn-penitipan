<?php

namespace Config;

use CodeIgniter\Database\Exceptions\DatabaseException;

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
$routes->setDefaultController('Admin');
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

$routes->get('create-table', function () {
        $migrate = \Config\Services::migrations();
        
        try {
            $migrate->latest();
            $migrate->setNamespace('Myth\Auth')->latest();
            $seeder = \Config\Database::seeder();
            $seeder->call('MainSeeder');
            echo 'Seed Success';
        } catch (\Throwable $e) {
            $e->getMessage();
        } finally {
            echo "Done";
        }
});

// whatsapp://send?text=Hello%2C%20World!

$routes->addRedirect('/', 'admin');

$routes->group('admin', ['filter' => 'login'], static function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->resource('umkm', ['placeholder' => '(:num)']);
    $routes->resource('item', ['placeholder' => '(:num)']);
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