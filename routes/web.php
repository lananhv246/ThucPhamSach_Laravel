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

Route::get('/','IndexController@index');
Route::get('template', function (){
   return view('layouts.main.template.master1');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 Route::group(['middleware'=>'web'], function () {
    Route::group(['prefix'=>'admin'], function () {
        Route::resource('admins','Admin\AdminsController');
        Route::get('',['as'=>'admin.home','uses'=>'ManagerDashboardController@index']);
        Route::get('login','Admin\LoginController@showLoginForm');
        Route::post('login','Admin\LoginController@login');
        Route::get('logout','Admin\LoginController@logout');
        Route::get('register','Admin\RegisterController@showRegistrationForm');
        Route::post('register','Admin\RegisterController@register');
        Route::post('logout','Admin\LoginController@logout');

        //danhmucloai
        Route::resource('danhmucloai','DanhmucloaiController');
        //loaisp
        Route::resource('loaisanpham','LoaisanphamController');
        //sanpham
        Route::resource('sanpham','SanphamController');
        //sanphamchitiet
        Route::resource('sanphamchitiet','SanphamchitietController');
        //chucvu
        Route::resource('chucvu','ChucvuController');
        //diachikh
        Route::resource('diachikh','DiachikhachhangController');
        //hangcungcap
        Route::resource('hangcungcap','HangcungcapController');
        //hoadon
        Route::resource('hoadon','HoadonController');
        //hoadonchitiet
        Route::resource('hoadonchitiet','HoadonchitietController');
        //imagelist
        Route::resource('imagelist','ImageListController');
        Route::post('imagelist/create','ImageListController@store');
        Route::delete('imagelist/delete/{id}', 'ImageListController@destroyall');
        //tonkho
        Route::resource('tonkho','TonkhoController');
        //phieuxuatkhochitiet
        Route::resource('phieuxuatkhochitiet','PhieuxuatkhochitietController');
        //phieuxuatkho
        Route::resource('phieuxuatkho','PhieuxuatkhoController');
        Route::get('phieuxuatkho/createnewoldorder/{id}',['as'=>'phieuxuatkho.createnewoldorder','uses'=>'PhieuxuatkhoController@createnewoldorder']);
        Route::post('phieuxuatkho/storenewoldorder/{id}',['as'=>'phieuxuatkho.storenewoldorder','uses'=>'PhieuxuatkhoController@storenewoldorder']);
        //nhacc
        Route::resource('nhacungcap','NhacungcapController');
        //phieunhap
        Route::resource('phieunhap','PhieunhapController');
        //phieunhapct
        Route::resource('phieunhapchitiet','PhieunhapchitietController');;
        //tramtrungchuyen
        Route::resource('tramtrungchuyen','TramtrungchuyenController');
        //trangthaihoadon
        Route::resource('trangthaihoadon','TrangthaihoadonController');
    });
 });
Route::group(['middleware' => 'auth'], function () {
    Route::resource('users','Auth\UsersController');
    Route::resource('checkout', 'CheckoutController');
    Route::get('/checkout1',['as'=>'checkout1','uses'=>'IndexController@checkout1']);
    Route::get('/checkout2',['as'=>'checkout2','uses'=>'IndexController@checkout2']);
});

Route::get('/carousel', function () {
   return view('layouts.fontend-layouts.master');

});
//sopping cart
Route::get('/cart/{id}',['as'=>'cart','uses'=>'CartController@cart'])->where('id','[0-9]+');
Route::get('/cart/plus/{id}',['as'=>'updateshoppingcartplus','uses'=>'CartController@updateQtyPlus']);
Route::delete('/shopping/delete-cart/{id}',['as'=>'deleteshoppingcart.delete-cart','uses'=>'CartController@delete_cart']);
Route::get('/shopping',['as'=>'shopping','uses'=>'CartController@shopping']);

//allsanpham
Route::get('/product_full',['as'=>'product_full', 'uses'=>'IndexController@product_full']);

//loc san pham
Route::get('danhmuc/{id}',['as'=>'danhmuc', 'uses'=>'IndexController@danhmucsanpham'])->where('id','[0-9]+');
Route::get('loaisanpham/{id}',['as'=>'loaisanpham', 'uses'=>'IndexController@loaisanpham']);

Route::get('choose_danhmuc',['as'=>'choose_danhmuc', 'uses'=>'IndexController@choose_danhmuc']);
//detail
Route::get('/chitiet/{id}',['as'=>'product_detail', 'uses'=>'IndexController@product_detail']);

//search
Route::post('/search',['as'=>'search','uses'=>'IndexController@search']);
Route::get('/search',['as'=>'search','uses'=>'IndexController@getsearch']);

Route::get('gioithieu',['as'=>'gioithieu', 'uses'=>'IndexController@gioithieu']);
Route::get('tintuc',['as'=>'tintuc', 'uses'=>'IndexController@tintuc']);
Route::get('lienhe',['as'=>'lienhe', 'uses'=>'IndexController@lienhe']);