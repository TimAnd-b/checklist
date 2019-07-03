<?php

use Illuminate\Http\Request;

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


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('signup', 'Api\AuthController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'Api\AuthController@logout');
        Route::get('user', 'Api\AuthController@user');
    });
});

Route::group([
    'middleware' => 'auth:api'
], function() {
    Route::get('checklists', 'Api\ChecklistController@index');
    Route::post('checklists', 'Api\ChecklistController@store');
    Route::delete('checklists', 'Api\ChecklistController@destroy');

    Route::get('checklists/{id}', 'Api\ListitemController@index');
    Route::post('checklists/{id}', 'Api\ListitemController@store');
    Route::delete('checklists/{id}/{list_id}', 'Api\ListitemController@destroy');
    Route::patch('checklists/{id}/{list_id}', 'Api\ListitemController@update');
});
