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



 Route::get('/api/usuarios/{correo?}', 'PersonaController@index');
Route::post('/api/usuarios', 'PersonaController@store');
Route::put(' /api/usuarios/{usuario}', 'PersonaController@update');
Route::delete('/api/usuarios/{id}', 'PersonaController@delete');


