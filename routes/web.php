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

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('runLogin');
Route::get('logout', 'Auth\LoginController@logout');

// Registration Routes...
Route::get('registrar', 'Auth\RegisterController@showRegistrationForm')->name('showRegister');
Route::post('registrar', 'Auth\RegisterController@register')->name('runRegister');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/fazer-pedido', 'PlantCareController@index')->name('newPlantCare');
    Route::post('/fazer-pedido', 'PlantCareController@store')->name('storePlantCare');
    
    Route::get('/meus-pedidos', 'PlantCareController@userRequests')->name('myRequests');

    Route::get('/achar-cuidador/{plantCareId}', 'PlantCareController@showPossibleCarers')->name('showPossibleCarers');


});
