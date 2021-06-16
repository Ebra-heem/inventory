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

Auth::routes(['register' => false]);




Route::group(['middleware' => ['auth']], function() {

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/product-buy-manage','PurchaseController@manage')->name('purchase.manage');
        Route::post('/product-buy-manage','PurchaseController@filter')->name('purchase.filter');
        Route::get('/product-transfer','StockController@transfer_list')->name('transfer.list');
        Route::post('/filter-transfer','StockController@transfer_filter')->name('transfer.filter');
        Route::post('/product-transfer','StockController@transfer')->name('stock.transfer');
        //category
        Route::resource('/category','CategoryController');
        
        //product
        Route::resource('/product','ProductController');
        Route::get('/all-products','ProductController@allProduct');
        Route::get('/import-products','ProductController@importList')->name('import.list');
        Route::get('/sr_import-products','ProductController@sr_importList')->name('sr_import.list');
        Route::post('/all-products','ProductController@importProduct')->name('product.import');
        Route::post('/all-sr_products','ProductController@sr_importProduct')->name('product.sr_import');
        Route::get('/product-list/{id}','ProductController@productList')->name('product.list');
        //stock
        Route::get('/warehouse-summary','StockController@summary')->name('warehouse.summary');
        Route::get('/stock-warehouse','StockController@warehouse')->name('stock.warehouse');
        Route::post('/stock-warehouse','StockController@filter')->name('stock.filter');
        Route::get('/stock-showroom','StockController@showroom')->name('stock.showroom');
        Route::post('/stock-showroom','StockController@filter_sr')->name('stock.filter_sr');
        Route::get('/stock-wh_sr','StockController@wh_sr')->name('stock.wh_sr');
        Route::post('/stock-wh_sr','StockController@filter_wh_sr')->name('stock.filter_wh_sr');

        Route::get('/stock-wh_transfer/{id}','StockController@wh_transfer')->name('stock.wh_transfer');
        Route::post('/stock-wh_transfer','StockController@wh_transfer_update')->name('stock.wh_transfer_update');
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
        Route::get('/supplier-print/{id}','SupplierController@print')->name('supplier.print');
        Route::get('/customer-print/{id}','CustomerController@print')->name('customer.print');
        Route::post('/customer-ledger','CustomerController@ledger')->name('customer.ledger');
        Route::resource('/rack','RackController');
        Route::resource('/wirehouse','WirehouseController');
        Route::resource('/employee','EmployeeController');

        Route::resource('/sales','SalesController');
        Route::get('/all-sales','SalesController@allSales')->name('sales.allsales');
        Route::get('/all-customers-dues','CustomerController@allDues')->name('customer.all_dues');
        Route::get('/all-customers-paid','CustomerController@allPaid')->name('customer.all_paid');
        Route::get('/all-suppliers-dues','SupplierController@allDues')->name('supplier.all_dues');

        Route::resource('/invoice','InvoiceController');
        Route::post('/invoice-sale','InvoiceController@save')->name('invoice.save');
        //add product
        Route::post('/invoice-add','InvoiceController@add')->name('product.add');
        Route::get('/add_item_delete/{id}','InvoiceController@delete_item')->name('add_item.delete');
        Route::get('/invoice-sale','InvoiceController@sale_index')->name('invoice.sale');
        Route::get('/invoice-edit/{id}','InvoiceController@invoice_edit')->name('invoice.invoice_edit');
        Route::any('/invoice-details/{id}','InvoiceController@details');
        Route::any('/invoice-delivery/{id}','InvoiceController@delivery');
        //Accounts Module
        Route::resource('/chart_account','ChartAccountController');
        
        //user module
        Route::get('/settings',[ 'as' => 'user.settings','uses'=>'UserController@settings']);
        Route::post('/settings',[ 'as' => 'user.settings','uses'=>'UserController@postSettings']);
        Route::resource('roles','RoleController');
        Route::resource('users','UserController');
        Route::get('/my-sales','UserController@mySale')->name('user.sale');

        Route::resource('permission','PermissionController');

    });
