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

Route::resource('product', 'ProductController');
Route::resource('category','CategoryController');
Route::resource('customer','CustomerController');
Route::resource('order','OrderController');
Route::resource('address','AddressController');
Auth::routes();

// Front routes
Route::get('/', 'Front\PageController@home')->name('front.home');
Route::get('shop', 'Front\PageController@allProducts')->name('front.allProducts');
Route::get('search-products', 'Front\PageController@searchProducts')->name('front.searchProducts');
Route::post('search-products-price', 'Front\PageController@searchProductsByPrice')->name('front.searchProductsByPrice');
Route::get('contact', 'Front\PageController@contact')->name('front.contact');
Route::get('/product-details/{slug}', 'Front\PageController@productDetails')->name('front.product.details');
Route::get('/category-details/{id}','Front\PageController@categoryDetails')->name('front.category.details');
Route::get('/about-us','front\PageController@aboutUs')->name('front.about.us');
// Front auth routes
Route::get('login', 'Shared\AuthController@frontLogin')->name('front.login');
Route::post('login', 'Shared\AuthController@frontAuthenticate')->name('front.authenticate');

Route::get('/password/{password}', function ($password) {
	return bcrypt($password);
});