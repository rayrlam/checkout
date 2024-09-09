<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Checkout\CrudController;
use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\Category\CategoryController;

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

    Route::get('/tasks/quotation/index', function () {
        return view('tasks.quotation.index');
    })->name('tasks.quotation.index');

    Route::get('/tasks/category/index', [CategoryController::class, 'index'])->name('tasks.category.index');
    Route::match(['get', 'post'], '/tasks/category/categories', [CategoryController::class,'categories'])->name('tasks.category.categories');
    Route::get('/tasks/category/category/{id}', [CategoryController::class, 'category']);
    Route::get('/tasks/category/breadcrumb', [CategoryController::class, 'breadcrumb'])->name('tasks.category.breadcrumb');
    Route::post('/tasks/category/breadcrumbs', [CategoryController::class, 'breadcrumbs'])->name('tasks.category.breadcrumbs');


    Route::get('/tasks/checkout/index', [CheckoutController::class, 'index'])->name('tasks.checkout.index');
    Route::get('/tasks/checkout/calculator', [CheckoutController::class, 'calculator'])->name('tasks.checkout.calculator');
    Route::post('/tasks/checkout/cal', [CheckoutController::class, 'cal'])->name('tasks.checkout.cal');
});

Route::middleware(['auth', 'throttle:60,1'])->group(function () {
    Route::get('/dashboard', [CrudController::class, 'index'])->name('dashboard');
    Route::get('/tasks/checkout/create', [CrudController::class, 'create'])->name('tasks.checkout.crud.create');
    Route::get('/tasks/checkout/createRule', [CrudController::class, 'createRule'])->name('tasks.checkout.crud.createRule');
    Route::get('/tasks/checkout/itemsearch', [CrudController::class, 'itemsearch'])->name('tasks.checkout.crud.itemsearch');
    Route::post('/tasks/checkout/storerule', [CrudController::class, 'storerule'])->name('tasks.checkout.crud.storerule');
    Route::post('/tasks/checkout/store', [CrudController::class, 'store'])->name('tasks.checkout.crud.store');
});

require __DIR__.'/auth.php';
