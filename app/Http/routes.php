<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
Route::get('prihlasit', 'Auth\AuthController@getLogin');
Route::post('prihlasit', 'Auth\AuthController@postLogin');
Route::get('odhlasit', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('registrovat', 'Auth\AuthController@getRegister');
Route::post('registrovat', 'Auth\AuthController@postRegister');
Route::get('/uzivatele/all', 'DefaultController@getAllUsers');
Route::get('/uzivatele/gallery/{galleryId}', 'DefaultController@getGallery');
Route::get('/', 'DefaultController@index');
Route::get('/uzivatele', 'DefaultController@getUsers');
Route::get('/uzivatel/{id}', 'DefaultController@getUser');


Route::get('/uzivatel/galleries/{id}', 'DefaultController@getUserById');
Route::get('/uzivatel/{id}/{galleryId}', 'DefaultController@getUserGallery');



Route::get('/home/{user}', 'HomeController@index');
Route::post('/home/nova-galerie', 'HomeController@postNewGallery');
Route::post('/home/{id}/pridat-fotky', 'HomeController@postAddPhotos');
Route::get('/home/{user}/{id}', 'HomeController@getGallery');

Route::delete('/home/delete/{id}', 'HomeController@deletePicture');
Route::get('/p/{id}', 'HomeController@getPicture');


Route::group(['prefix' => 'api'], function() {
	Route::get('/photos', 'PhotosController@index');
	Route::post('/photos/{id}/store', 'PhotosController@store');
	Route::delete('/photos/delete/{id}', 'PhotosController@delete');
	Route::get('/photos/{id}', 'PhotosController@show');
	Route::get('/photos/single/{id}', 'PhotosController@singlePicture');
	Route::delete('/photos/{id}/delete', 'PhotosController@deleteGallery');
});



