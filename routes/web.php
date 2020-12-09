<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@index');

Route::get('/about', 'PageController@about_us');

Route::get('/contacts', 'PageController@contacts');

Route::get('/bachelor', 'PageController@bachelor');

Route::get('/faculties', 'PageController@faculties');

Auth::routes();

Route::resource('education_degrees', 'EducationDegreesController');

Route::resource('faculties', 'FacultiesController');

Route::resource('news', 'NewsController');
