<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


// Route::get('/details', function () {
//     return view('pages.detail');
// });

Route::get('/home', function () {
    return view('home');
});

Route::get('/phpinfo', function () {
    return response()->json([
        'stuff'=> phpinfo()
    ]);
});

// Route::prefix('')
//     ->namespace('App\Http\Controllers')
//     ->group(function () {
//         Route::get('/', 'HomeController@index');
//     });

// Route::prefix('detail')
//     ->namespace('App\Http\Controllers')
//     ->group(function () {
//         Route::get('/', 'DetailController@index');
//     });

Route::get('/','App\Http\Controllers\HomeController@index')
->name('Home');

Route::get('/detail/{slug}','App\Http\Controllers\DetailController@index')
->name('detail');

Route::get('/checkout','App\Http\Controllers\CheckoutController@index')
->name('checkout');

Route::get('/checkout/success','App\Http\Controllers\CheckoutController@success')
->name('success');

Route::prefix('admin')
    ->namespace('App\Http\Controllers\Admin')
    ->middleware(['auth','admin']) // user login checking
    ->group(function () {
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');
    });

Auth::routes(['verify' => true]);

Route::resource('travel-package', 'App\Http\Controllers\Admin\TravelPackageController');

Route::resource('gallery', 'App\Http\Controllers\Admin\GalleryController');

Route::resource('transaction','App\Http\Controllers\Admin\TransactionController');

Route::post('/checkout/{id}','App\Http\Controllers\CheckoutController@process')
            ->name('checkout_process')
            ->middleware(['auth','verified']);

Route::get('/checkout/{id}','App\Http\Controllers\CheckoutController@index')
            ->name('checkout')
            ->middleware(['auth','verified']);

Route::post('/checkout/create/{detail_id}','App\Http\Controllers\CheckoutController@create')
            ->name('checkout-create')
            ->middleware(['auth','verified']);

Route::get('/checkout/remove/{detail_id}','App\Http\Controllers\CheckoutController@remove')
            ->name('checkout-remove')
            ->middleware(['auth','verified']);
            
Route::get('/checkout/confirm/{id}','App\Http\Controllers\CheckoutController@success')
            ->name('checkout-success')
            ->middleware(['auth','verified']);

