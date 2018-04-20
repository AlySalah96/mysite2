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


Route::get('/aa','cat_controller@ret_cat');


Route::post('edit/{id}','cat_controller@edit');


Route::get('delete/{id}','cat_controller@delete');

Route::post('add','cat_controller@add');

////// products ////////////////////////////////////////////////
Route::get('show_products/{id}','cat_controller@show_products');
Route::get('homePage2',function()
{
    return view('homePage2');

});

Route::post('edit_prod/{id}','cat_controller@edit_prod');

Route::get('delete_prod/{id}','cat_controller@delete_prod');


Route::post('add_prod','cat_controller@add_prod');

Route::get('buy_prod/{id}','cat_controller@buy_prod');
//////////////////////sulpliers////////////////////////////////
Route::get('show_suppliers_of/{id}','cat_controller@show_suppliers_of');
Route::get('show_products_of_sup/{sup_id}','cat_controller@show_products_of_sup');


Route::post('edit_sup/{id}','cat_controller@edit_sup');

Route::get('delete_sup/{id}','cat_controller@delete_sup');


Route::post('add_sup','cat_controller@add_sup');
