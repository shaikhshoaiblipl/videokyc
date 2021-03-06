<?php

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

Route::group(['namespace'=>'API'], function(){
	Route::group([
	  'prefix' => 'auth'
	], function() {
		Route::post('register', 'AuthController@index');
		Route::post('login', 'AuthController@login');
		Route::post('forgotPassword', 'AuthController@forgotPassword');
		Route::post('resetPassword', 'AuthController@resetPassword');

		Route::group([
		  'middleware' => 'auth:api'
		], function() {
		    Route::get('logout', 'AuthController@logout');
		    Route::post('updateProfile', 'AuthController@updateProfile');
		});
	});

	// APIs that can access after login
	Route::group([
	  'middleware' => 'auth:api'
	], function() {
		Route::post('getUserBySales', 'Webservices@getUserBySales');
		Route::post('uploadDocumentByUser', 'Webservices@uploadDocumentByUser');
		Route::post('uploadDocumentBysale', 'Webservices@uploadDocumentBysale');
		Route::post('twilioBySale', 'Webservices@twilioBySale');
		Route::post('twilioByUser', 'Webservices@twilioByUser');
		
    });

	// APIs that can access without login
	// Route::get('public', 'ControllerName@functionName');
	// Route::post('public', 'ControllerName@functionName');
	// Write your routs here...

	// for store device data
	Route::post('devices/readings', 'Webservices@storeDeviceReading');
});
