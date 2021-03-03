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
    return redirect('login');
   //return view('welcome');
});

Auth::routes();




Route::group(['middleware' => ['auth']], function() {

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/product-buy-manage','PurchaseController@manage')->name('purchase.manage');
        Route::post('/product-buy-manage','PurchaseController@filter')->name('purchase.filter');
        Route::post('/product-transfer','StockController@transfer')->name('stock.transfer');
        //category
        Route::resource('/category','CategoryController');
        
        //product
        Route::resource('/product','ProductController');
        Route::get('/all-products','ProductController@allProduct');
        Route::post('/all-products','ProductController@importProduct')->name('product.import');
        Route::get('/product-list/{id}','ProductController@productList')->name('product.list');
        //stock
        Route::get('/stock-warehouse','StockController@warehouse')->name('stock.warehouse');
        Route::post('/stock-warehouse','StockController@filter')->name('stock.filter');
        Route::get('/stock-showroom','StockController@showroom')->name('stock.showroom');
        Route::post('/stock-showroom','StockController@filter_sr')->name('stock.filter_sr');
        Route::get('/stock-wh_sr','StockController@wh_sr')->name('stock.wh_sr');
        Route::post('/stock-wh_sr','StockController@filter_wh_sr')->name('stock.filter_wh_sr');
        Route::resource('/stock','StockController');
        //purchase
        Route::get('/all-purchase','PurchaseController@allPurchase')->name('purchase.allsales');
        Route::get('/purchase-details/{id}','PurchaseController@details');
        Route::resource('/purchase','PurchaseController');
        //customer & supplier payment section
        Route::get('/customer-payment','CustomerController@payment')->name('customer.payment');
        Route::post('/customer-payment','CustomerController@paymentList')->name('customer.paymentList');

        Route::resource('/customer','CustomerController');
        Route::get('/supplier-payment','SupplierController@payment')->name('supplier.payment');
        Route::post('/supplier-payment','SupplierController@paymentList')->name('supplier.paymentList');

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
        Route::any('/invoice-delivery/{id}','InvoiceController@delivery');
        //Accounts Module
        Route::resource('/chart_account','ChartAccountController');
        
        //user module
        Route::resource('roles','RoleController');
        Route::resource('users','UserController');

    });
