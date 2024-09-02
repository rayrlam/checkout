<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Checkout\CrudController;
use App\Http\Controllers\Checkout\CheckoutController;

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

Route::middleware(['throttle:60,1'])->group(function () {
    Route::get('/', function(){
        return view('welcome');
    })->name('welcome');

    Route::get('/simple_test', [CheckoutController::class, 'simple_test'])->name('simple_test');
    Route::get('/calculator', [CheckoutController::class, 'calculator'])->name('calculator');
    Route::post('/cal', [CheckoutController::class, 'cal'])->name('cal');
});

Route::middleware(['auth', 'throttle:60,1'])->group(function () {
    Route::get('/dashboard', [CrudController::class, 'index'])->name('dashboard');
    Route::get('/create', [CrudController::class, 'create'])->name('crud.create');
    Route::get('/createRule', [CrudController::class, 'createRule'])->name('crud.createRule');
    Route::get('/itemsearch', [CrudController::class, 'itemsearch'])->name('crud.itemsearch');
    Route::post('/storerule', [CrudController::class, 'storerule'])->name('crud.storerule');
    Route::post('/store', [CrudController::class, 'store'])->name('crud.store');
});

require __DIR__.'/auth.php';
