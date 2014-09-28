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
/*
|
| Global routes filters
|
*/
Route::when('company/*', 'company');
Route::when('customer/*', 'customer');
/*
|
| Global routes models
|
*/
Route::model('user', 'User');
/* Public routes */
Route::get('/', array('as' => Routes::HOME, 'uses' => 'HomeController@index'));
Route::get('/for-customers', array('as' => Routes::FOR_CUSTOMERS, 'uses' => 'HomeController@customers'));
Route::get('/for-companies', array('as' => Routes::FOR_COMPANIES, 'uses' => 'HomeController@companies'));
Route::get('/login', array('as' => Routes::LOGIN, 'uses' => 'LoginController@index'));
Route::post('/do-login', array('as' => Routes::DO_LOGIN, 'uses' => 'LoginController@login'));
Route::get('/logout', array('as' => Routes::LOGOUT, 'uses' => 'LoginController@logout'));
/* Company routes */
Route::get('/company/home', array('as' => Routes::COMPANY_HOME, 'uses' => 'CompanyController@index'));
Route::get('/company/codes', array('as' => Routes::COMPANY_CODES, 'uses' => 'CompanyController@codes'));
Route::get('/company/gifts', array('as' => Routes::COMPANY_GIFTS, 'uses' => 'CompanyController@gifts'));
/* Customer routes */
Route::get('/customer/home', array('as' => Routes::CUSTOMER_HOME, 'uses' => 'CustomerController@index'));



