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
Route::get('/admin/{any?}', function() {
  return view('admin.index');
})->where('any', '.*');
Route::get('/{any?}', function () {
    return view('trangchu');
})->where('any', '.*');
Route::get('/home', [App\Http\Controllers\TestController::class, 'index'])->name('home');
Route::get('api/author', [App\Http\Controllers\api\AuthorController::class, 'index'])->name('get-list-author');
Route::post('admin/author/api/addauthor', [App\Http\Controllers\api\AuthorController::class, 'store'])->name('add-author');
Route::post('admin/api/editauthor/{ma}', [App\Http\Controllers\api\AuthorController::class, 'update'])->name('update-author');
Route::delete('admin/api/author/{ma}', [App\Http\Controllers\api\AuthorController::class, 'destroy'])->name('delete-author');
Auth::routes();



// Route::any('/admin', [App\Http\Controllers\Testcontroller::class, 'controllMethod'])->name('admin');

// Route::get('/admin/{any}', [App\Http\Controllers\AppController::class, 'index'])->where('any', '.*');