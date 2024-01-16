<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProductController;
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

Route::get('/add_product', [ProductController::class, 'index'])->name('add_product');
Route::post('/insert_product', [ProductController::class, 'store'])->name('insert_product');
Route::get('/view_product', [ProductController::class, 'show'])->name('view_product');
Route::get('/edit_product/{id}', [ProductController::class, 'edit'])->name('edit_product');
Route::post('/update_product/{id}', [ProductController::class, 'update'])->name('update_product');
Route::get('/delete_product/{id}', [ProductController::class, 'destroy'])->name('delete_product');

Route::get('/view_users', [UserController::class, 'show'])->name('view_users');

