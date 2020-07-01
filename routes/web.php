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

Route::get('/', function () {
    return redirect('login');
    //return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//SETTINGS
Route::get('/settings', 'SettingsController@index')->name('settings');
Route::get('/settings/business/edit', 'SettingsController@editBusiness')->name('editBussiness');
Route::post('/settings/business/store', 'SettingsController@storeBusiness')->name('storeBusiness');

//Address
Route::get('/address/states', 'AddressController@getStates')->name('getStates');
Route::get('/address/state/{state}/cities', 'AddressController@getCities')->name('getCities');
Route::get('/address/cep/{cep}', 'AddressController@getAddressByCep')->name('getAddressByCep');

Route::resource('clients', 'ClientsController');

Route::resource('employees', 'EmployeesController');

Route::resource('lawsuits', 'LawsuitsController');

//Route::resource('users', 'UsersController');
