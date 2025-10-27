<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

if (is_file(SYSTEMPATH .'Config/Routes.php')) {
    require SYSTEMPATH .'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('home');
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
$routes->get('/produk', 'Produk::index');
$routes->get('/satuan', 'Satuan::index');
$routes->get('/admin', 'Admin::index');
$routes->get('/kategori', 'Kategori::index');
$routes->get('/user', 'User::index');
$routes->get('admin/settings', 'Admin::Settings');

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
 * needing to reload it or re-instantiating the class.
 *
 * Remember that all routes must have a matching controller method with the
 * same name, and that will be the method that is called when the route
 * is hit.
 *
 * The paths for the require statement here are within the Config directory.
 * Once it is found, then the file can be included here, and any code in that
 * file can access the $routes object as needed.
 *
 * Place your declarations in the `app/Config/Routes.php` file.
 * You may also declare routes in external files and include them
 * here using the `require` statement.
 */

// require 'Routes/admin.php';