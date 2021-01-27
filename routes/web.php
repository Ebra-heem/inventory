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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();




Route::group(['middleware' => ['auth']], function() {

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/product-buy-manage','PurchaseController@manage')->name('purchase.manage');
        Route::post('/product-buy-manage','PurchaseController@filter')->name('purchase.filter');
        Route::post('/product-transfer','StockController@transfer')->name('stock.transfer');
        Route::resource('/product','ProductController');
        Route::get('/all-products','ProductController@allProduct');
        Route::resource('/stock','StockController');
        Route::resource('/purchase','PurchaseController');

        Route::resource('/customer','CustomerController');
        Route::resource('/supplier','SupplierController');
        Route::post('/supplier-ledger','SupplierController@ledger')->name('supplier.ledger');
        Route::post('/customer-ledger','CustomerController@ledger')->name('customer.ledger');
        Route::resource('/rack','RackController');
        Route::resource('/wirehouse','WirehouseController');
        Route::resource('/employee','EmployeeController');

        Route::resource('/sales','SalesController');
        Route::get('/all-sales','SalesController@allSales')->name('sales.allsales');
        Route::get('/all-customers-dues','CustomerController@allDues')->name('customer.all_dues');
        Route::get('/all-suppliers-dues','SupplierController@allDues')->name('supplier.all_dues');

        Route::resource('/invoice','InvoiceController');

        Route::post('/invoice-sale','InvoiceController@save')->name('invoice.save');
        Route::get('/invoice-sale','InvoiceController@sale_index')->name('invoice.sale');
        Route::any('/invoice-details/{id}','InvoiceController@details');
        Route::any('/purchase-details/{id}','PurchaseController@details');

    Route::resource('roles','RoleController');
    Route::resource('users','UserController');

    });
