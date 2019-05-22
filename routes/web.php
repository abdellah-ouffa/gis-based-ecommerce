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


// Routes for Backend
// Routes for auth users
Auth::routes();
Route::group(['prefix' => 'admin'], function () {
	Route::get('login', 'Shared\AuthController@backendLogin')->name('backend.login');
	Route::post('login', 'Shared\AuthController@backendAuthenticate')->name('backend.authenticate');
	Route::post('logout', 'Shared\AuthController@logout')->name('backend.logout');
});

Route::group(['prefix' => 'admin', 'middleware' => 'authAdmin'], function () {
	Route::resource('product', 'ProductController');
	Route::resource('category','CategoryController');
	Route::resource('customer','CustomerController');
	Route::resource('order','OrderController');
	Route::resource('address','AddressController');
});

// Routes for auth users (Front)
Route::group(['middleware' => 'authCustomer'], function () {
	Route::get('account', 'front\PageController@account')->name('front.account');
	Route::patch('update-account', 'front\PageController@updateAccount')->name('front.updateAccount');
	Route::patch('update-password', 'front\PageController@updatePassword')->name('front.updatePassword');
});
// Routes for frontend
Route::get('/', 'Front\PageController@home')->name('front.home');
Route::get('shop', 'Front\PageController@allProducts')->name('front.allProducts');
Route::get('search-products', 'Front\PageController@searchProducts')->name('front.searchProducts');
Route::post('search-products-price', 'Front\PageController@searchProductsByPrice')->name('front.searchProductsByPrice');
Route::get('/product-details/{slug}', 'Front\PageController@productDetails')->name('front.product.details');
Route::get('/category-details/{id}','Front\PageController@categoryDetails')->name('front.category.details');

// Routes for front auth
Route::get('login', 'Shared\AuthController@frontLogin')->name('front.login');
Route::post('login', 'Shared\AuthController@frontAuthenticate')->name('front.authenticate');
Route::get('register', 'Shared\AuthController@frontRegister')->name('front.register');
Route::post('register', 'Shared\AuthController@frontStoreCustomer')->name('front.storeCustomer');
Route::post('logout', 'Shared\AuthController@logout')->name('front.logout');

// Routes for manage cart products
Route::get('cart', 'Front\CartController@index')->name('cart.index');
Route::post('cart', 'Front\CartController@store')->name('cart.store');
Route::put('cart', 'Front\CartController@update')->name('cart.update');
Route::delete('cart/{id}', 'Front\CartController@destroy')->name('cart.destroy');
Route::get('checkout', 'Front\CartController@checkout')->name('cart.checkout');
Route::post('order/store', 'Front\OrderController@store')->name('order.store');
Route::get("check-md",["uses"=>"Front\CartController@index","middleware"=>"authCustomer"]);

// Routes for static pages
Route::get('/about-us','front\PageController@aboutUs')->name('front.about.us');
Route::get('contact', 'Front\PageController@contact')->name('front.contact');
 











// Route::post('checkout', 'Backend\OrderController@checkout')->name('order.checkout');
// // Routes for order resource
// Route::resource('order', 'Backend\OrderController');
// // Default route
// Route::get('/', 'Backend\DashboardController@index')->name('customer.dashboard');

// Routes for tests
Route::get('/password/{password}', function ($password) {
	return bcrypt($password);
});

Route::get('/test', function () {
	return view('auth.login-admin');
});

Route::get('/delete', function () {
	Cart::destroy();
});

Route::get('/auth-user', function () {
	dd(auth()->user());
});