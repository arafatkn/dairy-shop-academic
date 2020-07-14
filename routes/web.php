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
Route::get('/', 'ProductController@index')->name('index');
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/cart', 'ProductController@cartShow')->name('products.cart.index');
Route::get('/products/{product}', 'ProductController@show')->name('products.show');

Route::post('/products/reviews', 'ProductController@reviewStore')->name('products.reviews.index');
Route::post('/products/cart', 'ProductController@cartStore');
Route::get('/products/cart/remove/{index}', 'ProductController@cartDestroy')->name('products.cart.remove');

Route::get('/order/shipping', 'OrderController@shipping')->name('order.shipping');
Route::post('/order/shipping', 'OrderController@shippingStore');
Route::get('/order/payment', 'OrderController@payment')->name('order.payment');
Route::post('/order/payment', 'OrderController@paymentStore');
Route::get('/order/done', 'OrderController@done')->name('order.done');
Route::get('/order', 'OrderController@index')->name('order.index');


Route::group(['prefix' => 'auth', 'as'=> 'auth.'],
	function () {

        Route::get('/login', 'AuthController@login')->name('login');
        Route::get('/register', 'AuthController@register')->name('register');
		Route::get('/logout', 'AuthController@logout')->name('logout');
		Route::get('/lostpass', 'AuthController@lostpass')->name('lostpass');

		Route::post('/login', 'AuthController@loginPost');
		Route::post('/register', 'AuthController@registerPost');
        Route::post('/lostpass', 'AuthController@lostpassPost');
    }
);

//Admin Rules
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as'=> 'admin.'],
	function () {

        Route::get('/', 'PageController@index')->name('index');

		Route::get('/orders/{order}/status/{status}', 'OrderController@status');

		Route::resources([
            'users' => 'UserController',
            'orders' => 'OrderController',
            'products' => 'ProductController',
            'cards' => 'CardController',
		]);

		Route::resource('reviews', 'ReviewController')->only(['index','destroy','edit']);
		Route::group(['prefix' => 'settings', 'as'=> 'settings.'],
			function () {
				Route::get('/', 'SettingController@index')->name('index');
				Route::get('/password', 'SettingController@password')->name('password');
				Route::post('/password', 'SettingController@passwordPost');
			}
		);

	}
);
