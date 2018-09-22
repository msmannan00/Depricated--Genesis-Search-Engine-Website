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

Route::get('/', 'homepage@getView');

Route::get('/home', 'homepage@getView');

Route::get('/search','search@searchResult');

Route::get('/tor_alert','tor_alert@getView');

Route::get('/content','content@searchResult');

Route::get('/add_website','add_website@getView');

Route::get('/reportus','reportus@getView');

Route::get('/about','about@getView');
