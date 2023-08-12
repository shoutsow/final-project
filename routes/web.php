<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\UserController;


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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', IndexController::class)->name('index');

Route::get('/catalog/index', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog/category/{slug}', [CatalogController::class, 'category'])->name('catalog.category');
Route::get('/catalog/brand/{slug}', [CatalogController::class, 'brand'])->name('catalog.brand');
Route::get('/catalog/product/{slug}', [CatalogController::class, 'product'])->name('catalog.product');

Route::get('/basket/index', [BasketController::class, 'index'])->name('basket.index');
Route::get('/basket/checkout', [BasketController::class, 'checkout'])->name('basket.checkout');

Route::post('/basket/add/{id}', [BasketController::class, 'add'])
    ->where('id', '[0-9]+')
    ->name('basket.add');

Route::post('/basket/plus/{id}', [BasketController::class, 'plus'])
    ->where('id', '[0-9]+')
    ->name('basket.plus');
Route::post('/basket/minus/{id}', [BasketController::class, 'minus'])
    ->where('id', '[0-9]+')
    ->name('basket.minus');

Route::post('/basket/remove/{id}', [BasketController::class, 'remove'])
    ->where('id', '[0-9]+')
    ->name('basket.remove');
Route::post('/basket/clear', [BasketController::class, 'clear'])->name('basket.clear');

Route::group(['prefix' => 'user'], function() {
    Route::get('index', [UserController::class, 'index'])->name('user.index');
    Auth::routes();
});

//Route::group(['prefix' => 'admin'], function() {
//    Route::get('index', App\Http\Controllers\Admin\IndexController::class)->name('admin.index');
//});

Route::group([
    'as' => 'admin.', // имя маршрута, например admin.index
    'prefix' => 'admin', // префикс маршрута, например admin/index
    'namespace' => 'App\Http\Controllers\Admin', // пространство имен контроллера
    'middleware' => ['auth', 'admin'] // один или несколько посредников
], function () {
    // главная страница панели управления
    Route::get('index', App\Http\Controllers\Admin\IndexController::class)->name('index');
    // CRUD-операции над категориями каталога
    Route::resource('category', CategoryController::class);
});

Route::post('/basket/saveorder', [BasketController::class, 'saveorder'])->name('basket.saveorder');
Route::get('/basket/success', [BasketController::class, 'success'])->name('basket.success');

