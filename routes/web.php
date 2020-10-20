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

Route::get('/', 'web\DashboardController@index')->name('dashboard');

Route::post('/register', 'web\LoginController@register')->name('register');
Route::post('/login', 'web\LoginController@login')->name('login');
Route::get('/logout', 'web\LoginController@logoutUser')->name('logout');

Route::get('/getCovidDataList', 'web\DailyCasesController@getCovidDataList')->name('get_covid_data_list');
Route::get('/record_filter', 'web\DailyCasesController@filterCovidData')->name('record_filter');

Route::get('/create_covid_data', 'web\DailyCasesController@createCovidData')->name('create_covid_data');
Route::post('/save_covid_data', 'web\DailyCasesController@saveCovidData')->name('save_form');

Route::get('/edit_record', 'web\DailyCasesController@editCovidData')->name('edit_record');
Route::post('/update_covid_data', 'web\DailyCasesController@updateCovidData')->name('update_form');
Route::post('/delete-record', 'web\DailyCasesController@deleteCovidData')->name('delete-record');

Route::get('/get_api_list', 'web\DashboardController@get_api_list')->name('get_api_list');
