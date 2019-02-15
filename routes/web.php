<?php

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

$router->get('/lastwaterstatus', 'WaterSensorController@getLastWaterState');

$router->get('/lastwater/{limit?}', function (WaterSensorController $controller, $limit = 200) {
    return $controller->getWaterState($limit);
});

$router->get('/lastwaterperdays/{days?}', function (WaterSensorController $controller, $days = 30) {
    return $controller->getWaterStatePerDays($days);
});

$router->get('/waterstatusbetweendates/{firstDate}/{secondDate}', 'LightSensorControllers@getLightStatusBetweenDates');


$router->get('/lastlightstatus', 'LightSensorControllers@getLastWaterState');

$router->get('/lastlight/{limit?}', function (LightSensorController $controller, $limit = 200) {
    return $controller->getLightState($limit);
});

$router->get('/lastlightperdays/{days?}', function (LightSensorController $controller, $days = 30) {
    return $controller->getLightStatePerDays($days);
});

$router->get('/lightstatusbetweendates/{firstDate}/{secondDate}', 'LightSensorControllers@getLightStatusBetweenDates');