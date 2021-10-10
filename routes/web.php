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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/show/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show-car');

Route::get('/create/website', [App\Http\Controllers\WebsiteController::class, 'create'])->name('create-website');

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::prefix('seller')->middleware(['auth:sanctum'])->group(function() {
    // We Can Use Resource Controller for the below instead of create route for each action
    Route::get('/mycars', [App\Http\Controllers\Seller\DashboardController::class, 'index'])->name('seller-dashboard');
    Route::get('/mycars/create', [App\Http\Controllers\Seller\DashboardController::class, 'create_or_edit'])->name('post-car');
    Route::post('/mycars/create', [App\Http\Controllers\Seller\DashboardController::class, 'save'])->name('store-car');
    Route::get('/mycars/{id}/edit', [App\Http\Controllers\Seller\DashboardController::class, 'create_or_edit'])->name('edit-car');
    Route::put('/mycars/{id}', [App\Http\Controllers\Seller\DashboardController::class, 'save'])->name('update-car');
    Route::get('/mycars/{id}', [App\Http\Controllers\Seller\DashboardController::class, 'delete'])->name('delete-car');
    Route::get('/mycars/{id}/restore', [App\Http\Controllers\Seller\DashboardController::class, 'restore'])->name('restore-car');
    
    Route::get('/usedcars', [App\Http\Controllers\UsedCarController::class, 'index'])->name('usedcars');
});

