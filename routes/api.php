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
  //Ngôn ngữ
  Route::get('admin/category', [App\Http\Controllers\api\CategoriesController::class, 'index'])->name('get-list-category');
  Route::get('admin/parent_category', [App\Http\Controllers\api\CategoriesController::class, 'getListByParent'])->name('get-list-parent-category');
  Route::post('admin/addcategory', [App\Http\Controllers\api\CategoriesController::class, 'store'])->name('add-category');
  Route::post('admin/editcategory/{ma}', [App\Http\Controllers\api\CategoriesController::class, 'update'])->name('update-category');
  Route::delete('admin/deletecategory/{ma}', [App\Http\Controllers\api\CategoriesController::class, 'destroy'])->name('delete-category');

  //Sách
  Route::get('admin/all_category', [App\Http\Controllers\api\CategoriesController::class, 'getAll'])->name('get-all-category');
  Route::get('admin/all_language', [App\Http\Controllers\api\LanguagesController::class, 'getAll'])->name('get-all-category');
  Route::get('admin/all_publisher', [App\Http\Controllers\api\PublishersController::class, 'getAll'])->name('get-all-category');
  Route::get('admin/all_author', [App\Http\Controllers\api\AuthorController::class, 'getAll'])->name('get-all-category');


  Route::get('admin/book', [App\Http\Controllers\api\BooksController::class, 'index'])->name('get-list-book');
  Route::get('admin/all_book', [App\Http\Controllers\api\BooksController::class, 'getAll'])->name('get-list-book');
  Route::get('admin/findbook/{ma}', [App\Http\Controllers\api\BooksController::class, 'find'])->name('find-book');
  Route::post('admin/addbook', [App\Http\Controllers\api\BooksController::class, 'store'])->name('add-book');
  Route::post('admin/editbook/{ma}', [App\Http\Controllers\api\BooksController::class, 'update'])->name('update-book');
  Route::delete('admin/deletebook/{ma}', [App\Http\Controllers\api\BooksController::class, 'destroy'])->name('delete-book');


  //user
  Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [App\Http\Controllers\UserController::class, 'register']);
Route::post('login', [App\Http\Controllers\UserController::class, 'login']);
Route::get('profile','UserController@getAuthenticatedUser');

Route::middleware('auth:api')->get('/user', function(Request $request){
    return $request->user();
});

