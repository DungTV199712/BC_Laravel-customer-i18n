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
use Illuminate\Support\Facades\Route;
//Route::get('/', function () {
//    return view('home');
//});
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'locale'] , function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('/customers', 'CustomerController@index')->name('customers.index');
    Route::get('/customers/create', 'CustomerController@create')->name('customers.create');
    Route::post('/customers/create', 'CustomerController@store')->name('customers.store');
    Route::get('/customers/{id}/edit', 'CustomerController@edit')->name('customers.edit');
    Route::post('/customers/{id}/edit', 'CustomerController@update')->name('customers.update');
    Route::get('/customers/{id}.destroy', 'CustomerController@destroy')->name('customers.destroy');
    Route::get('/change-language/{language}', 'LanguageController@Changelanguage')->name('customers.change-language');
});