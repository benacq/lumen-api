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
//    return phpinfo();
});



$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('products',  ['uses' => 'ProductController@showAllProducts']);

    $router->get('products/{id}', ['uses' => 'ProductController@showOneProduct']);

    $router->post('products', ['uses' => 'ProductController@create']);

    $router->delete('products/{id}', ['uses' => 'ProductController@delete']);

    $router->put('products/{id}', ['uses' => 'ProductController@update']);
});
