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

// Auth Routes
Route::post('auth/login', 'AuthController@login')->name('auth-login');

Route::group(['middleware' => 'verify.api.token'], function() {
	
	// Media Routes
	Route::get('media/get-files', 'MediaController@getFiles')->name('get-files');
	Route::post('media/upload', 'MediaController@upload')->name('media-upload');

	// Profile Routes
	Route::post('profile/get-profile', 'ProfileController@getProfile')->name('get-profile');
	Route::post('profile/save', 'ProfileController@save')->name('profile-save');

	// Settings Routes
	Route::post('settings/get-settings', 'SettingsController@getSettings')->name('get-settings');
	Route::post('settings/save', 'SettingsController@save')->name('settings-save');

	// Change Password
	Route::post('change-password/save', 'ChangePasswordController@save')->name('get-users');

	// User Routes
	Route::post('user/get-users', 'UserController@getUsers')->name('get-users');
	Route::post('user/get-single-user', 'UserController@getSingleUser')->name('get-single-user');
	Route::post('user/change-password', 'UserController@changeUserPassword')->name('change-user-password');
	Route::post('user/create', 'UserController@createUser')->name('create-user');
	Route::post('user/update', 'UserController@updateUser')->name('update-user');
	Route::post('user/delete', 'UserController@deleteUser')->name('delete-user');

	// Group Routes
	Route::post('group/get-groups', 'GroupController@getGroups')->name('get-groups');
	Route::post('group/get-all-groups', 'GroupController@getAllGroups')->name('get-all-groups');
	Route::post('group/get-single-group', 'GroupController@getSingleGroup')->name('get-single-group');
	Route::post('group/create', 'GroupController@createGroup')->name('create-group');
	Route::post('group/update', 'GroupController@updateGroup')->name('update-group');
	Route::post('group/delete', 'GroupController@deleteGroup')->name('delete-group');

	// Product Routes
	Route::post('product/get-products', 'ProductController@getProducts')->name('get-products');
	Route::post('product/get-single-product', 'ProductController@getSingleProduct')->name('get-single-product');
	Route::post('product/create', 'ProductController@createProduct')->name('create-product');
	Route::post('product/update', 'ProductController@updateProduct')->name('update-product');
	Route::post('product/delete', 'ProductController@deleteProduct')->name('delete-product');

	// Menu Routes
	Route::post('get-menus', 'MenuController@getMenus')->name('get-menus');
	Route::post('get-user-menus', 'MenuController@getUserMenus')->name('get-user-menus');

	// Privilege Routes
	Route::post('privilege/get-privileges', 'PrivilegeController@getPrivileges')->name('get-privileges');
	Route::post('privilege/save', 'PrivilegeController@savePrivilege')->name('save-privilege');

	// Transaction Routes
	Route::post('transaction/get-transactions', 'TransactionController@getTransactions')->name('get-transactions');
	Route::post('transaction/get-single-transaction', 'TransactionController@getSingleTransaction')->name('get-single-transaction');
});

// Global View Routes
Route::get('{path}', function() {
	return view('app');
})->where('path', '.*');

