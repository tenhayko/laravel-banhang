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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienhe'
]);

Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioithieu'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddToCart'
]);
Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
Route::get('check-out',[
	'as'=>'checkout',
	'uses'=>'PageController@getCheckout'
]);
Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);
Route::get('dang-nhap',[
	'as'=>'dangnhap',
	'uses'=>'PageController@getLogIn'
]);
Route::post('dang-nhap',[
	'as'=>'dangnhap',
	'uses'=>'PageController@postLogIn'
]);
Route::get('dang-ky',[
	'as'=>'dangky',
	'uses'=>'PageController@getSignup'
]);
Route::post('dang-ky',[
	'as'=>'dangky',
	'uses'=>'PageController@postSignup'
]);
Route::get('dang-xuat',[
	'as'=>'dangxuat',
	'uses'=>'PageController@postSigOut'
]);
Route::get('tim-kiem',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);