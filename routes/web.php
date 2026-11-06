<?php

use App\Http\Controllers\Cashier\CashierController;
use App\Http\Controllers\Management\CategoryController;
use App\Http\Controllers\Management\MenuController;
use App\Http\Controllers\Management\TableController;
use App\Http\Controllers\Management\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Report\ReportController;
use Illuminate\Support\Facades\Route;

// For Home
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// To check for userr other than admin
Route::middleware(['auth'])->group(function () {
    // Cashier Routes
    Route::get('/cashier', [CashierController::class, 'index']);
    Route::get('/cashier/getMenuByCategory/{category_id}', [CashierController::class, 'getMenuByCategory']);
    Route::get('/cashier/getTable', [CashierController::class, 'getTables']);
    Route::get('/cashier/getSaleDetailsByTable/{table_id}', [CashierController::class, 'getSaleDetailsByTable']);
    Route::post("/cashier/orderFood", [CashierController::class, 'orderFood']);
    Route::post("/cashier/deleteSaleDetail", [CashierController::class, 'deleteSaleDetail']);
    Route::post("/cashier/increase-quantity", [CashierController::class, 'increaseQuantity']);
    Route::post("/cashier/decrease-quantity", [CashierController::class, 'decreaseQuantity']);
    Route::post('/cashier/confirmOrderStatus', [CashierController::class, 'confirmOrderStatus']);
    Route::post('/cashier/savepayment', [CashierController::class, 'savepayment']);
    Route::get('/cashier/showReceipt/{saleID}', [CashierController::class, 'showReceipt']);
});
Route::middleware(['auth', 'AuthAdmin'])->group(function () {
    // Management Routes
    Route::get('/management', function () {
        return view('management.index');
    });
    Route::resource('/management/category', CategoryController::class);
    Route::resource('/management/menu', MenuController::class);
    Route::resource('/management/table', TableController::class);
    Route::resource('/management/user', UserController::class);
    //Report Routes
    Route::get('/report', [ReportController::class, 'index']);
    Route::get('/report/show', [ReportController::class, 'show']);
    Route::get('/report/show/export', [ReportController::class, 'export']); // FOR EXPORT
});

// authentication
Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
