<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API route group
Route::group(['prefix' => 'v1', 'middleware' => ['auth:api']], function () {

    // Matches "/api/v1/getDailyCasesTotalFigures"
    Route::post('/getDailyCasesTotalFigures', 'api\APIController@getDailyCasesTotalFigures')->name('get_daily_cases_total_figures');
    Route::post('/getCovidProgressForDateRange', 'api\APIController@getCovidProgressForDateRange')->name('get_covid_progress_for_date_range');
    Route::post('/getCovidRecoveriesForDateRange', 'api\APIController@getCovidRecoveriesForDateRange')->name('get_covid_recoveries_for_date_range');
    Route::post('/getDistrictDistribution', 'api\APIController@getDistrictDistribution')->name('get_district_distribution');
    Route::post('/getGenderWiseBreakdown', 'api\APIController@getGenderWiseBreakdown')->name('get_gender_wise_breakdown');
    Route::post('/getAllDailyCases', 'api\APIController@getAllDailyCases')->name('get_all_daily_cases');

});
