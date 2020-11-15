<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$router->get('/', function () use ($router) {
    return view('index');
});

$router->get('/categorias', function () use ($router) {
    return view('categorias');
});

$router->get('/categorias/cadastrar', function () use ($router) {
    return view('categorias/cadastrar');
});

$router->group(['prefix'=>'api'], function() use($router){
    $router->get('/categorias/read', 'CategoriasController@read');
    $router->post('/categorias/new', 'CategoriasController@create');
    $router->get('/categorias/show/{id}', 'CategoriasController@show');
    $router->put('/categorias/update/{id}', 'CategoriasController@update');
    $router->delete('/categorias/delete/{id}', 'CategoriasController@destroy');
});