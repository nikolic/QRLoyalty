<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('/for-customers', 'HomeController@customers');
Route::get('/for-companies', 'HomeController@companies');

Route::get('/login', 'LoginController@index');

/* Company routes */

Route::get('/company/home', 'CompanyController@index');
Route::get('/company/codes', 'CompanyController@codes');
Route::get('/company/gifts', 'CompanyController@gifts');


