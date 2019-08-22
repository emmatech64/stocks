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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'UsersController@login')->name('login');
Route::post('/login', 'UsersController@signIn')->name('signIn');


Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
        Route::post('/logout', 'UsersController@logout')->name('logout');

        Route::get('/categories', 'CategoriesController@index')->name('categories.all');
        Route::post('/categories', 'CategoriesController@store')->name('category.store');
        Route::get('/categories/{category}', 'CategoriesController@show')->name('category.show');
        Route::delete('/categories/{category}', 'CategoriesController@destroy')->name('category.destroy');

        Route::get('/products', 'ProductsController@index')->name('products.all');
        Route::post('/products', 'ProductsController@store')->name('products.store');
        Route::get('/products/{product}', 'ProductsController@show')->name('products.show');
        Route::delete('/products/{product}', 'ProductsController@destroy')->name('products.destroy');

        Route::get('/suppliers', 'SuppliersController@index')->name('suppliers.all');
        Route::post('/suppliers', 'SuppliersController@store')->name('suppliers.store');
        Route::get('/suppliers/{supplier}', 'SuppliersController@show')->name('suppliers.show');
        Route::delete('/suppliers/{supplier}', 'SuppliersController@destroy')->name('suppliers.destroy');

        Route::get('/stock', 'StocksController@index')->name('stocks.all');
        Route::post('/stock', 'StocksController@store')->name('stocks.store');
        Route::get('/stock/{stock}', 'StocksController@show')->name('stocks.show');
        Route::delete('/stock/{stock}', 'StocksController@destroy')->name('stocks.destroy');
    });
});





