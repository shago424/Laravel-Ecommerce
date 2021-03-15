<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','SiteController@index')->name('index');
Route::get('catagory/{slug}','SiteController@catagory')->name('catagory'); 
Route::get('catagoryb/{slug}','SiteController@catagoryb')->name('catagoryb'); 
Route::get('brand/{slug}','SiteController@brand')->name('brand');
Route::get('product/{slug}','SiteController@product')->name('product'); 



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'admin','middleware'=>['admin','auth'],'namespace'=>'admin'],function(){ 
	Route::get('dashboard','AdminController@index')->name('admin.dashboard');

});

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){ 
	Route::get('dashboard','UserController@index')->name('user.dashboard');

});

//========Users============

	Route::prefix('users')->group(function(){
	Route::get('/view','backend\UserController@view')->name('users.view');
	Route::get('/add','backend\UserController@add')->name('users.add');
	Route::post('/store','backend\UserController@store')->name('users.store');
	Route::get('/edit/{id}','backend\UserController@edit')->name('users.edit');
	Route::post('/update/{id}','backend\UserController@update')->name('users.update');
	Route::get('/delete/{id}','backend\UserController@delete')->name('users.delete');


});

	Route::prefix('profiles')->group(function(){
	Route::get('/view','backend\ProfileController@view')->name('profiles.view');
	Route::get('/edit','backend\ProfileController@edit')->name('profiles.edit');
	Route::post('/store','backend\ProfileController@update')->name('profiles.update');
	Route::get('/password/view','backend\ProfileController@passwordview')->name('profiles.password.view');
	Route::post('/password/update','backend\ProfileController@passwordupdate')->name('profiles.password.update');
});

	//========Student============

	Route::prefix('students')->group(function(){
	Route::get('/view','backend\StudentController@view')->name('students.view');
	Route::get('/add','backend\StudentController@add')->name('students.add');
	Route::post('/store','backend\StudentController@store')->name('students.store');
	
});

Route::prefix('brands')->group(function(){
	Route::get('/brand/view-brand', 'Brand\BrandController@view')->name('brands.view-brand');
Route::get('/brand/add-brand', 'Brand\BrandController@add')->name('brands.add-brand');
Route::post('/brand/store-brand', 'Brand\BrandController@store')->name('brands.store-brand');
Route::get('/brand/inactive{id}', 'Brand\BrandController@inactive')->name('brands.inactive-brand');
Route::get('/brand/active{id}', 'Brand\BrandController@active')->name('brands.active-brand');
Route::get('/brand/edit{id}', 'Brand\BrandController@edit')->name('brands.edit-brand');
Route::post('/brand/update{id}', 'Brand\BrandController@update')->name('brands.update-brand');
Route::get('/brand/delete{id}', 'Brand\BrandController@delete')->name('brands.delete-brand');
Route::get('/brand/status/{id}/{status}', 'Brand\BrandController@brandstatus')->name('brands.brandstatus');
});
//Catagories
Route::prefix('catagories')->group(function(){
Route::get('/catagory/view-catagory', 'Catagory\CatagoryController@view')->name('catagories.view-catagory');
Route::get('/catagory/add-catagory', 'Catagory\CatagoryController@add')->name('catagories.add-catagory');
Route::post('/catagory/store-catagory', 'Catagory\CatagoryController@store')->name('catagories.store-catagory');
Route::get('/catagory/inactive{id}', 'Catagory\CatagoryController@inactive')->name('catagories.inactive-catagory');
Route::get('/catagory/active{id}', 'Catagory\CatagoryController@active')->name('catagories.active-catagory');
Route::get('/catagory/edit{id}', 'Catagory\CatagoryController@edit')->name('catagories.edit-catagory');
Route::post('/catagory/update{id}', 'Catagory\CatagoryController@update')->name('catagories.update-catagory');
Route::get('/catagory/delete{id}', 'Catagory\CatagoryController@delete')->name('catagories.delete-catagory');
Route::get('/catagory/status/{id}/{status}', 'Catagory\CatagoryController@catagorystatus')->name('catagories.catagorystatus');
});


//Sub Sub Catagories
Route::prefix('subsubcatagories')->group(function(){
Route::get('/subsubcatagory/view-subsubcatagory', 'SubSubCatagory\SubSubCatagoryController@view')->name('subsubcatagories.view-subsubcatagory');
Route::get('/subsubcatagory/add-subsubcatagory', 'SubSubCatagory\SubSubCatagoryController@add')->name('subsubcatagories.add-subsubcatagory');
Route::post('/subsubcatagory/store-subsubcatagory', 'SubSubCatagory\SubSubCatagoryController@store')->name('subsubcatagories.store-subsubcatagory');
Route::get('/subsubcatagory/inactive{id}', 'SubSubCatagory\SubSubCatagoryController@inactive')->name('subsubcatagories.inactive-subsubcatagory');
Route::get('/subsubcatagory/active{id}', 'SubSubCatagory\SubSubCatagoryController@active')->name('subsubcatagories.active-subsubcatagory');
Route::get('/subsubcatagory/edit/subsub{id}', 'SubSubCatagory\SubSubCatagoryController@edit')->name('subsubcatagories.edit-subsubcatagory');
Route::post('/subsubcatagory/update{id}', 'SubSubCatagory\SubSubCatagoryController@update')->name('subsubcatagories.update-subsubcatagory');
Route::get('/subsubcatagory/delete{id}', 'SubSubCatagory\SubSubCatagoryController@delete')->name('subsubcatagories.delete-subsubcatagory');
Route::get('/subsubcatagory/status/{id}/{status}', 'SubSubCatagory\SubSubCatagoryController@subsubcatagorystatus')->name('subsubcatagories.subsubcataorystatus');
});
//SubCatagories
Route::prefix('subcatagories')->group(function(){
Route::get('/subcatagory/view-subcatagory', 'Subcatagory\SubcatagoryController@view')->name('subcatagories.view-subcatagory');
Route::get('/subcatagory/add-subcatagory', 'Subcatagory\SubcatagoryController@add')->name('subcatagories.add-subcatagory');
Route::post('/subcatagory/store-subcatagory', 'Subcatagory\SubcatagoryController@store')->name('subcatagories.store-subcatagory');
Route::get('/subcatagory/inactive{id}', 'Subcatagory\SubcatagoryController@inactive')->name('subcatagories.inactive-subcatagory');
Route::get('/subcatagory/active{id}', 'Subcatagory\SubcatagoryController@active')->name('subcatagories.active-subcatagory');
Route::get('/subcatagory/edit{id}', 'Subcatagory\SubcatagoryController@edit')->name('subcatagories.edit-subcatagory');
Route::post('/subcatagory/update{id}', 'Subcatagory\SubcatagoryController@update')->name('subcatagories.update-subcatagory');
Route::get('/subcatagory/delete{id}', 'Subcatagory\SubcatagoryController@delete')->name('subcatagories.delete-subcatagory');
Route::get('/subcatagory/status/{id}/{status}', 'Subcatagory\SubcatagoryController@subcatagorystatus')->name('subcatagories.subcatagorystatus');
});
//===============Slider============
Route::prefix('sliders')->group(function(){
Route::get('/slider/view-slider', 'Slider\SliderController@view')->name('sliders.view-slider');
Route::get('/slider/add-slider', 'Slider\SliderController@add')->name('sliders.add-slider');
Route::post('/slider/store-slider', 'Slider\SliderController@store')->name('sliders.store-slider');
Route::get('/slider/inactive{id}', 'Slider\SliderController@inactive')->name('sliders.inactive-slider');
Route::get('/slider/active{id}', 'Slider\SliderController@active')->name('sliders.active-slider');
Route::get('/slider/edit{id}', 'Slider\SliderController@edit')->name('sliders.edit-slider');
Route::post('/slider/update{id}', 'Slider\SliderController@update')->name('sliders.update-slider');
Route::get('/slider/delete{id}', 'Slider\SliderController@delete')->name('sliders.delete-slider');
Route::get('/slider/status/{id}/{status}', 'Slider\SliderController@sliderstatus')->name('sliders.sliderstatus');
});
//===============Product============
Route::prefix('products')->group(function(){
Route::get('/product/view-product', 'Product\ProductController@view')->name('products.view-product');
Route::get('/product/add-product', 'Product\ProductController@add')->name('products.add-product');
Route::post('/product/store-product', 'Product\ProductController@store')->name('products.store-product');
Route::get('/product/inactive{id}', 'Product\ProductController@inactive')->name('products.inactive-product');
Route::get('/product/active{id}', 'Product\ProductController@active')->name('products.active-product');
Route::get('/product/edit{id}', 'Product\ProductController@edit')->name('products.edit-product');
Route::post('/product/update{id}', 'Product\ProductController@update')->name('products.update-product');
Route::get('/product/delete{id}', 'Product\ProductController@delete')->name('products.delete-product');
Route::get('/product/status/{id}/{status}', 'Product\ProductController@productstatus')->name('products.productstatus');

});

 Route::prefix('posts')->group(function(){

 	Route::get('post/catagories/view','backend\CatagoryController@view')->name('catagory.view');
Route::get('post/catagories/add','backend\CatagoryController@add')->name('catagory.add');
Route::post('post/catagories/store','backend\CatagoryController@store')->name('catagory.store');
Route::get('post/catagories/edit{id}','backend\CatagoryController@edit')->name('catagory.edit');
Route::post('post/catagories/update{id}','backend\CatagoryController@update')->name('catagory.update');
Route::get('post/catagories/delete{id}','backend\CatagoryController@delete')->name('catagory.delete');
Route::get('post/catagories/inactive{id}','backend\CatagoryController@inactive')->name('catagory.inactive');
Route::get('post/catagories/active{id}','backend\CatagoryController@active')->name('catagory.active');

});

