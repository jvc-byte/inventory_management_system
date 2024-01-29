<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use App\Models\Customer;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register_user', UserController::class)->name('register_user');



Route::get('/register_customer', [CustomerController::class, 'index'])->name('register_customer');
Route::post('/register_customer', [CustomerController::class, 'store'])->name('register_customer');
Route::get('/view_customer', [CustomerController::class, 'show'])->name('view_customer');
Route::get('/edit_customer/{id}', [CustomerController::class, 'edit'])->name('edit_customer');
Route::post('/edit_customer/{id}', [CustomerController::class, 'update'])->name('edit_customer');
Route::get('/delete_customer/{id}', [CustomerController::class, 'destroy'])->name('delete_customer');

Route::get('/manager/home', [ManagerController::class, 'index'])->name('manager.home');
Route::get('/warehouse/home', [WarehouseController::class, 'index'])->name('warehouse.home');
Route::get('/warehouse/receive_product/{id}', [ProductController::class, 'productReceive'])->name('warehouse.receive_product');
Route::get('/warehouse/insert_in_warehouse/{id}', [WarehouseController::class, 'productUpdate'])->name('warehouse.insert_in_warehouse');


Route::get('/warehouse/search_product', [ProductController::class, 'searchProduct'])->name('warehouse.search_product');
Route::post('/warehouse/search_product', [ProductController::class, 'searchProductResult'])->name('warehouse.search_product');

Route::get('/warehouse/add_product', [ProductController::class, 'index'])->name('warehouse.add_product');
Route::post('/insert_product', [ProductController::class, 'store'])->name('insert_product');
Route::get('/warehouse/view_product', [ProductController::class, 'show'])->name('warehouse.view_product');
Route::get('/warehouse/edit_product/{id}', [ProductController::class, 'edit'])->name('warehouse.edit_product');
Route::post('/warehouse/update_product/{id}', [ProductController::class, 'update'])->name('warehouse.update_product');
Route::get('/delete_product/{id}', [ProductController::class, 'destroy'])->name('delete_product');

Route::get('/view_users', [UserController::class, 'show'])->name('view_users');
Route::get('/edit_user/{id}', [UserController::class, 'edit'])->name('edit_user');
Route::post('/update_user/{id}', [UserController::class, 'update'])->name('update_user');
Route::get('/delete_user/{id}', [UserController::class, 'destroy'])->name('delete_user');

Route::get('/warehouse/add_supplier', [SupplierController::class, 'index'])->name('warehouse.add_supplier');
Route::post('/insert_supplier', [SupplierController::class, 'store'])->name('insert_supplier');
Route::get('/warehouse/view_supplier', [SupplierController::class, 'show'])->name('warehouse.view_supplier');
Route::get('/warehouse/edit_supplier/{id}', [SupplierController::class, 'edit'])->name('warehouse.edit_supplier');
Route::post('/warehouse/update_supplier/{id}', [SupplierController::class, 'update'])->name('warehouse.update_supplier');
Route::get('/delete_supplier/{id}', [SupplierController::class, 'destroy'])->name('delete_supplier');

Route::post('/register_user', [UserController::class, 'store'])->name('register_user');