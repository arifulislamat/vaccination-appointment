<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('vaccines', 'Controller@vaccines');
    $router->get('vaccines/{vaccineId}', 'Controller@getVaccine');

    $router->get('hospitals', 'Controller@hospitals');
    $router->get('hospitals/{hospitalId}', 'Controller@getHospital');

    $router->post('users/appointment', 'Controller@storeAppointment');
    $router->post('users/appointment/{appointmentId}', 'Controller@updateAppointment');
    $router->get('users/{userId}/appointment', 'Controller@getUserAppointment');
    $router->get('users/{userId}/appointments', 'Controller@getUserAppointments');
    $router->get('appointments/{appointmentId}', 'Controller@getAppointment');
});
