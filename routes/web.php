<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\CheckoutController;

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

Route::get('/', [CheckoutController::class, 'checkout'])->name('checkout');

Route::middleware(['auth', 'throttle:60,1'])->group(function () {

    Route::get('/dashboard', [CrudController::class, 'index'])->name('dashboard');
    Route::get('/create', [CrudController::class, 'create'])->name('crud.create');
    Route::post('/store', [CrudController::class, 'store'])->name('crud.store');
    Route::get('/createRule', [CrudController::class, 'createRule'])->name('crud.createRule');

    Route::get('/itemsearch', [CrudController::class, 'itemsearch'])->name('crud.itemsearch');

    Route::post('/storerule', [CrudController::class, 'storerule'])->name('crud.storerule');

});


require __DIR__.'/auth.php';
