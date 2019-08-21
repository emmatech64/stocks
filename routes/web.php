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
    Route::get('/admin/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::post('/logout', 'UsersController@logout')->name('logout');

    Route::get('/admin/categories', 'CategoriesController@index')->name('categories.all');
    Route::post('/admin/categories', 'CategoriesController@store')->name('category.store');
    Route::get('/admin/categories/{category}', 'CategoriesController@show')->name('category.show');
    Route::delete('/admin/categories/{category}', 'CategoriesController@destroy')->name('category.destroy');

    Route::get('/admin/products', 'ProductsController@index')->name('products.all');
    Route::post('/admin/products', 'ProductsController@store')->name('products.store');
    Route::get('/admin/products/{product}', 'ProductsController@show')->name('products.show');
    Route::delete('/admin/products/{product}', 'ProductsController@destroy')->name('products.destroy');
});






Route::get('/admin/purchases/{purchases}', 'PurchasesController@index')->name('purchases.all');


