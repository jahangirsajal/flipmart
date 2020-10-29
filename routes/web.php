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
//Frontend
Route::get('/', 'SiteController@index');
Route::get('/product', 'SiteController@product');

//Admin
Auth::routes();

//Dashboard
Route::get('/dashboard', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    //Brand
    Route::get('/brand/add-brand', 'BrandController@add')->name('add-brand');
    Route::post('/brand/save-brand', 'BrandController@save')->name('save-brand');
    Route::get('/brand/manage-brand', 'BrandController@manage')->name('manage-brand');
    Route::get('/brand/inactive/{id}', 'BrandController@inactive')->name('inactive-brand');
    Route::get('/brand/active/{id}', 'BrandController@active')->name('active-brand');
    Route::get('/brand/delete/{id}', 'BrandController@delete')->name('delete-brand');
    Route::get('/brand/edit/{id}', 'BrandController@edit')->name('edit-brand');
    Route::post('/brand/update-brand', 'BrandController@update')->name('update-brand');

    //Category
    Route::get('/category/manage-category', 'CategoryController@manage')->name('manage-category');
    Route::get('/category/add-category', 'CategoryController@add')->name('add-category');
    Route::post('/category/save-category', 'CategoryController@save')->name('save-category');
    Route::get('/category/inactive/{id}', 'CategoryController@inactive')->name('inactive-category');
    Route::get('/category/active/{id}', 'CategoryController@active')->name('active-category');
    Route::get('/category/delete/{id}', 'CategoryController@delete')->name('delete-category');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('edit-category');
    Route::post('/category/update-category', 'CategoryController@update')->name('update-category');

    //Sub Category
    Route::get('/category/manage-sub-category', 'SubCategoryController@subManage')->name('manage-subcategory');
    Route::get('/category/add-sub-category', 'SubCategoryController@add')->name('add-subcategory');
    Route::post('/category/save-sub-category', 'SubCategoryController@save')->name('save-subcategory');
    Route::get('/category/inactive-sub-category/{id}', 'SubCategoryController@inactive')->name('inactive-subcategory');
    Route::get('/category/active-sub-category/{id}', 'SubCategoryController@active')->name('active-subcategory');
    Route::get('/category/delete-sub-category/{id}', 'SubCategoryController@delete')->name('delete-subcategory');
    Route::get('/category/edit-sub-category/{id}', 'SubCategoryController@edit')->name('edit-subcategory');
    Route::post('/category/update-sub-category', 'SubCategoryController@update')->name('update-subcategory');

    //Sliders
    Route::prefix('sliders')->name('sliders.')->group(function () {
        Route::get('/manage', 'SliderController@index')->name('manage');
        Route::get('/add', 'SliderController@create')->name('create');
        Route::post('/store', 'SliderController@store')->name('store');
        Route::get('/edit/{id}', 'SliderController@edit')->name('edit');
        Route::post('/update/{id}', 'SliderController@update')->name('update');
        Route::get('/delete/{id}', 'SliderController@delete')->name('delete');
        Route::get('/active/{id}', 'SliderController@active')->name('active');
        Route::get('/inactive/{id}', 'SliderController@inactive')->name('inactive');
    });

    //Producs
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/manage', 'ProductController@index')->name('manage');
        Route::get('/add', 'ProductController@create')->name('create');
        Route::post('/store', 'ProductController@store')->name('store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
        Route::post('/update/{id}', 'ProductController@update')->name('update');
        Route::get('/delete/{id}', 'ProductController@delete')->name('delete');
        Route::get('/active/{id}', 'ProductController@active')->name('active');
        Route::get('/inactive/{id}', 'ProductController@inactive')->name('inactive');
    });
});
