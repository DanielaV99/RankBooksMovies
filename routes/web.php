<?php

use App\Http\Controllers\ItemController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/rank-items', [ItemController::class, 'rankItems'])->name('rank-items');
    Route::get('/create', [ItemController::class, 'create'])->name('item.create');
    Route::post('/store', [ItemController::class, 'store'])->name('item.store');
    Route::get('/store-success', [ItemController::class, 'storeSuccess'])->name('item.store.success');
    Route::get('/add-review/{id}', [ItemController::class, 'reviewCreate'])->name('item.review.create');
    Route::post('/review-store', [ItemController::class, 'reviewStore'])->name('item.review.store');
});

require __DIR__.'/auth.php';
