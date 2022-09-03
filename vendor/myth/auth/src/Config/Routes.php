<?php

/*
 * Myth:Auth routes file.
 */
$routes->group('', ['namespace' => 'Myth\Auth\Controllers'], function ($routes) {
    // Login/out
    $routes->get('login', 'AuthController::login', ['as' => 'login']);
    $routes->post('login', 'AuthController::attemptLogin');
    $routes->get('logout', 'AuthController::logout');

    // Registration
    $routes->get('register', 'AuthController::register', ['as' => 'register', 'filter' => 'role:superadmin']);
    $routes->post('register', 'AuthController::attemptRegister', ['filter' => 'role:superadmin']);

    // Activation
    // $routes->get('activate-account', 'AuthController::activateAccount', ['as' => 'activate-account']);
    // $routes->get('resend-activate-account', 'AuthController::resendActivateAccount', ['as' => 'resend-activate-account']);

    // Forgot/Resets
    // $routes->get('forgot', 'AuthController::forgotPassword', ['as' => 'forgot']);
    // $routes->post('forgot', 'AuthController::attemptForgot');
    // $routes->get('reset-password', 'AuthController::resetPassword', ['as' => 'reset-password']);
    // $routes->put('admin/edit', 'AuthController::attemptReset', ['as' => 'edit']);
});
