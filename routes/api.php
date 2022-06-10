<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('admin/author', [App\Http\Controllers\AuthorController::class, 'index'])->name('get-list-author');
Route::delete('admin/deleteauthor/{ma}', [App\Http\Controllers\api\AuthorController::class, 'destroy'])->name('delete-author');
 //Nhà xuát bản
Route::get('admin/publisher', [App\Http\Controllers\api\PublishersController::class, 'index'])->name('get-list-publisher');
Route::post('admin/addpublisher', [App\Http\Controllers\api\PublishersController::class, 'store'])->name('add-publisher');
Route::post('admin/editpublisher/{ma}', [App\Http\Controllers\api\PublishersController::class, 'update'])->name('update-publisher');
Route::delete('admin/deletepublisher/{ma}', [App\Http\Controllers\api\PublishersController::class, 'destroy'])->name('delete-publisher');

 //Ngôn ngữ
 Route::get('admin/language', [App\Http\Controllers\api\LanguagesController::class, 'index'])->name('get-list-language');
 Route::post('admin/addlanguage', [App\Http\Controllers\api\LanguagesController::class, 'store'])->name('add-language');
 Route::post('admin/editlanguage/{ma}', [App\Http\Controllers\api\LanguagesController::class, 'update'])->name('update-language');
 Route::delete('admin/deletelanguage/{ma}', [App\Http\Controllers\api\LanguagesController::class, 'destroy'])->name('delete-language');