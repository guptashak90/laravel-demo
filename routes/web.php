<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// LoginController
Route::get('/', 'Auth\LoginController@index');
Route::get('login', 'Auth\LoginController@index');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// homeController
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile');
Route::post('/profile', 'HomeController@updateProfile');
Route::post('/changePassword', 'HomeController@changePassword');

// userController
Route::get('/usersListing', 'UserController@index')->name('usersListing');
Route::get('/createUser', 'UserController@create')->name('createUser');
Route::post('/createUser', 'UserController@store');
Route::post('/deleteUser/{id}', 'UserController@destroy')->name('deleteUser');
Route::get('/editUser/{id}', 'UserController@edit')->name('editUser');
Route::post('/updateUser/{id}', 'UserController@update');
Route::get('/changeUserStatus/{id}', 'UserController@changeStatus');

//category and subcategory resourcefull controller
Route::resources([
    'category' => 'CategoryController',
    'subcategory' => 'SubCategoryController'
]);


