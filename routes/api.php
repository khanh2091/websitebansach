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
 //Nhà xuát bản
Route::get('admin/publisher', [App\Http\Controllers\api\PublishersController::class, 'index'])->name('get-list-publisher');
Route::post('admin/addpublisher', [App\Http\Controllers\api\PublishersController::class, 'store'])->name('add-publisher');
Route::post('admin/editpublisher/{ma}', [App\Http\Controllers\api\PublishersController::class, 'update'])->name('update-publisher');
Route::delete('admin/deletepublisher/{ma}', [App\Http\Controllers\api\PublishersController::class, 'destroy'])->name('delete-publisher');