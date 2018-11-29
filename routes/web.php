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
Route::group(['prefix'=>'admin'],function (){
    Route::get('login','UsersController@getLogin');
    Route::post('login','UsersController@postLogin');
    Route::get('index','CategoryController@Index');
    Route::group(['prefix'=>'theloai'],function (){
        Route::get('danhsach','CategoryController@getDanhSach');

        Route::get('sua/{id}','CategoryController@getSua');
        Route::post('sua/{id}','CategoryController@postSua');

        Route::get('them','CategoryController@getThem');
        Route::post('them','CategoryController@postThem');
        Route::get('xoa/{id}','CategoryController@Xoa');
    });
    Route::group(['prefix'=>'products'],function (){
        Route::get('danhsach','SanPhamController@getDanhSach');

        Route::get('sua/{id}','SanPhamController@getSua');
        Route::post('sua/{id}','SanPhamController@postSua');

        Route::get('them','SanPhamController@getThem');
        Route::post('them','SanPhamController@postThem');
        Route::get('xoa/{id}','SanPhamController@Xoa');
    });
    Route::group(['prefix'=>'customers'],function (){
        Route::get('danhsach','CusController@getDanhSach');
        Route::get('xoa/{id}','CusController@getXoa');

    });
    Route::group(['prefix'=>'user'],function (){
        Route::get('danhsach','UsersController@getDanhSach');

        Route::get('sua/{id}','UsersController@getSua');
        Route::post('sua/{id}','UsersController@postSua');

        Route::get('them','UsersController@getThem');

        Route::post('them','UsersController@postThem');


        Route::get('xoa/{id}','UsersController@getXoa');

        Route::get('logout','UsersController@Logout');
    });
});
route::get('/','DatabaseController@index')->name('index');
route::get('/product/{id?}','DatabaseController@product')->name('product');
route::get('/type/{type}','DatabaseController@type')->name('type');
route::get('/cart{id?}','DatabaseController@cart')->name('cart');
route::get('/del-cart{id?}','DatabaseController@delItems')->name('delItems');
route::post('/checkout','DatabaseController@postCheckout')->name('checkout');
route::get('/search','DatabaseController@getSearch')->name('search');
route::get('/Get-Slide','DatabaseController@GetSlide');
route::get('/login','UsersController@getLogin')->name('login');
//route::get('/index','CategoryController@Index')->name('index');


route::get('/prices','Client\HomeController@prices')->name('prices');
route::get('/signup','Client\HomeController@signup')->name('signup');

route::get('/404','Client\HomeController@error404')->name('404');
route::get('/about','Client\HomeController@about')->name('about');
route::get('/checkout','Client\HomeController@checkout')->name('checkout');
route::get('/contacts','Client\HomeController@contacts')->name('contacts');


Route::get('them','ModelController@them');


