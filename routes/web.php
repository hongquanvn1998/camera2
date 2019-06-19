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



/************************** Admin ************************/
Auth::routes();
Auth::routes(['verify' => true]); 
Route::group([
	'namespace'=>'Admin' 
],function(){
	Route::get('dang-nhap','LoginController@index')->name('DangNhap');
	Route::post('hanlde-login','LoginController@handleLogin')->name('handleLogin');
	Route::get('/dang-xuat','LoginController@logout')->name('dangxuat');
	Route::get('/dang-ky','LoginController@signin')->name('dangky');
	Route::post('/handle-dang-ky','LoginController@handleSignin')->name('handleDangky');

	Route::post('/xac-nhan-email-hi','LoginController@verify')->name('VerifyE');

	Route::get('/xac-nhan-email/{id}','LoginController@reVerify')->name('recodeverifi');

	Route::get('/quen-mat-khau','LoginController@forgot')->name('forgot');

	Route::post('/gui-email','LoginController@confirmMail')->name('confirmMail');

	Route::post('/xac-nhan-email','LoginController@confirmPass')->name('confirmPass');
	Route::post('/thay-doi-mat-khau/{id}','LoginController@changePass')->name('changePass');

	Route::get('/gui-xac-nhan-email/{id}','LoginController@recodepas')->name('recodepas');



	


	Route::get('facebook/redirect', 'LoginController@redirectToProvider')->name('fb');
	Route::get('facebook/callback', 'LoginController@handleProviderCallback');
	
});


Route::group([
	'prefix'=>'admin',
	'as'=>'admin.',
	'namespace'=>'Admin',
	'middleware'=>'auth',
],function(){
	Route::get('dashboard','DashBoardController@index')->name('dashboard');
			/**** Product **********/
	Route::get('product','ProductController@index')->name('product');
	Route::get('add-product','ProductController@add')->name('AddProduct');
	Route::post('handle-add-product','ProductController@HandelAdd')->name('hanldeAddProduct');
	Route::post('delete-product','ProductController@delete')->name('deleteProduct');
	Route::get('edit-product/{id}','ProductController@edit')->name('editProduct');
	Route::post('handle-edit-product/{id}','ProductController@handleEdit')->name('handleEditProducts');

	/*************** Brand ********/
	Route::get('brand','BrandController@index')->name('brand');
	Route::get('add-brand','BrandController@add')->name('addBrand');
	Route::post('handle-add-brand','BrandController@handleAdd')->name('handleAddBrand');
	Route::post('delete-brand','BrandController@delete')->name('deleteBrand');
	Route::get('edit-brand','BrandController@edit')->name('editBrand');
	Route::post('handle-edit-brand,{id}','BrandController@handleEdit')->name('handleEditBrand');
	/************** Categories ************/
	Route::get('categories','CategoriesController@index')->name('categories');
	Route::post('delete-categories','CategoriesController@delete')->name('deleteCategories');
	Route::get('add-categories','CategoriesController@add')->name('addCategories');
	Route::post('handle-add-categories','CategoriesController@handleadd')->name('handleAddCategories');
	Route::get('edit-categories','CategoriesController@edit')->name('editCategories');
	Route::post('handle-edit-categories/{id}','CategoriesController@handleEdit')->name('handleEditCategories');
	/********* Bill *************/
	Route::get('bill','BillController@index')->name('bill');
	Route::get('bill-detail/{id}','BillController@detailBill')->name('detailBill');
	Route::get('pdf/{id}','BillController@pdf')->name('pdf');
	
});

/*************************** Front-end ***********************************/

// Route::get('/', function () {
//     return view('front-end.base');
// });
Route::group([
	'namespace'=>'FrontEnd'
],function(){
	Route::get('','HomeController@index')->name('home');
	Route::get('lien-he','HomeController@contact')->name('contact');

	Route::post('gui-lien-he','HomeController@sendContact')->name('sentContact');

	Route::get('gioi-thieu','HomeController@introduce')->name('introduce');

	Route::get('chi-tiet-san-pham/{id}','HomeController@detail')->name('detail');
	
	Route::get('danh-muc-cac-san-pham/{id}','HomeController@allProduct')->name('allProduct');

	Route::get('cac-san-pham/{id}','HomeController@CateProduct')->name('cateProduct');

	Route::get('san-pham','HomeController@product')->name('product');

	Route::post('search','HomeController@search')->name('search');
	/******************** Cart *********************/

}); 

Route::group([
	'namespace'=>'FrontEnd',
	'middleware'=>'auth',
],function(){
	Route::POST('cart','CartController@cart')->name('Cart');
	Route::get('show-cart','CartController@showCart')->name('showCart');
	Route::POST('delete-cart','CartController@deleteCart')->name('deleteCart');
	Route::POST('update-cart','CartController@updateCart')->name('updateCart');

	Route::get('payment','PaymentController@index')->name('payment');
	Route::post('payment-order/{id}','PaymentController@PayOrder')->name('paymentOrder');

	Route::get('don-hang/{id}','PaymentController@order')->name('donhang');
	// Route::get('cap-nhat-thong-tin','DashBoardController@updateProfile')->name('updateProfile');
});

