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
Route::post('/registration', array('as' => Routes::REGISTRATION, 'uses' => 'LoginController@registration'));
/*
 * Company routes
*/
Route::get('/company/home', array('as' => Routes::COMPANY_HOME, 'uses' => 'CompanyController@index'));
Route::get('/company/codes', array('as' => Routes::COMPANY_CODES, 'uses' => 'CompanyController@codes'));
Route::get('/company/gifts', array('as' => Routes::COMPANY_GIFTS, 'uses' => 'CompanyController@gifts'));
Route::post('/company/loyaltycode/create', array('as' => Routes::LOYALTY_CODE_CREATE, 'uses' => 'LoyaltyCodeController@create'));
Route::post('/company/gift/create', array('as' => Routes::GIFT_CREATE, 'uses' => 'GiftController@create'));
/*
 * Customer routes
*/
Route::get('/customer/home', array('as' => Routes::CUSTOMER_HOME, 'uses' => 'CustomerController@index'));
Route::get('/customer/catalogue', array('as' => Routes::CUSTOMER_CATALOGUE, 'uses' => 'CustomerController@catalogue'));
Route::get('/customer/account', array('as' => Routes::CUSTOMER_ACCOUNT, 'uses' => 'CustomerController@account'));
Route::post('/customer/account/change-password', array('as' => Routes::CUSTOMER_ACCOUNT_CHANGE_PASSWORD, 'uses' => 'CustomerController@changePassword'));

// Route::group(array('prefix' => 'api/v1', 'before' => 'auth.basic'), function()
// {
//     Route::resource('url', 'ApiController');
// });

Route::post('/api/authenticate', array('as' => Routes::API_COMPANY_LOGIN, 'uses' => 'ApiController@authenticate'));
Route::post('/api/gifts', array('as' => Routes::API_COMPANY_GIFTS, 'uses' => 'ApiController@gifts', 'before' => 'api.auth'));
Route::post('/api/validate', array('as' => Routes::API_COMPANY_VALIDATE_CODE, 'uses' => 'ApiController@validateCode', 'before' => 'api.auth'));

