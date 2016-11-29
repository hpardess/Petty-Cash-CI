<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index');



Route::get('/', function () {

    return view('welcome');

});


Route::auth();


Route::group(['middleware' => ['auth']], function() {

	Route::get('/home', 'HomeController@index');

	Route::resource('users','Admin\UserController');

	//Route::get('roles',['as'=>'roles.index','uses'=>'Admin\RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('roles',['as'=>'roles.index','uses'=>'Admin\RoleController@index']);
	// Route::get('roles/create',['as'=>'roles.create','uses'=>'Admin\RoleController@create','middleware' => ['permission:role-create']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'Admin\RoleController@create']);
	// Route::post('roles/create',['as'=>'roles.store','uses'=>'Admin\RoleController@store','middleware' => ['permission:role-create']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'Admin\RoleController@store']);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'Admin\RoleController@show']);
	// Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'Admin\RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'Admin\RoleController@edit']);
	// Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'Admin\RoleController@update','middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'Admin\RoleController@update']);
	// Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'Admin\RoleController@destroy','middleware' => ['permission:role-delete']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'Admin\RoleController@destroy']);
});


