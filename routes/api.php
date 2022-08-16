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
// Quản trị
// Route::get('a/author', [App\Http\Controllers\api\AuthorController::class, 'index'])->name('get-list-author');
Route::get('admin/author', [App\Http\Controllers\api\AuthorController::class, 'index'])->name('get-list-author');
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
  //Thể loại
  Route::get('admin/category', [App\Http\Controllers\api\CategoriesController::class, 'index'])->name('get-list-category');
  Route::get('admin/parent_category', [App\Http\Controllers\api\CategoriesController::class, 'getListByParent'])->name('get-list-parent-category');
  Route::post('admin/addcategory', [App\Http\Controllers\api\CategoriesController::class, 'store'])->name('add-category');
  Route::post('admin/editcategory/{ma}', [App\Http\Controllers\api\CategoriesController::class, 'update'])->name('update-category');
  Route::delete('admin/deletecategory/{ma}', [App\Http\Controllers\api\CategoriesController::class, 'destroy'])->name('delete-category');

  //danh mục
  Route::get('admin/all_category', [App\Http\Controllers\api\CategoriesController::class, 'getAll'])->name('get-all-category');
  Route::get('admin/all_language', [App\Http\Controllers\api\LanguagesController::class, 'getAll'])->name('get-all-category');
  Route::get('admin/all_publisher', [App\Http\Controllers\api\PublishersController::class, 'getAll'])->name('get-all-category');
  Route::get('admin/all_author', [App\Http\Controllers\api\AuthorController::class, 'getAll'])->name('get-all-category');

//Sách
  Route::get('admin/book', [App\Http\Controllers\api\BooksController::class, 'index'])->name('get-list-book');
  Route::get('admin/all_book', [App\Http\Controllers\api\BooksController::class, 'getAll'])->name('get-list-book');
  Route::get('admin/findbook/{ma}', [App\Http\Controllers\api\BooksController::class, 'find'])->name('find-book');
  Route::post('admin/addbook', [App\Http\Controllers\api\BooksController::class, 'store'])->name('add-book');
  Route::post('admin/editbook/{ma}', [App\Http\Controllers\api\BooksController::class, 'update'])->name('update-book');
  Route::delete('admin/deletebook/{ma}', [App\Http\Controllers\api\BooksController::class, 'destroy'])->name('delete-book');

//Đặt hàng
Route::get('admin/order', [App\Http\Controllers\api\OrderController::class, 'allorder'])->name('get-list-order');
Route::get('admin/all_order', [App\Http\Controllers\api\OrderController::class, 'getAll'])->name('get-order');

Route::get('admin/findorder/{ma}', [App\Http\Controllers\api\OrderController::class, 'show'])->name('find-order');
Route::post('admin/addorder', [App\Http\Controllers\api\OrderController::class, 'store'])->name('add-order');
Route::post('admin/editorder/{ma}', [App\Http\Controllers\api\OrderController::class, 'update'])->name('update-order');
Route::delete('admin/deleteorder/{ma}', [App\Http\Controllers\api\OrderController::class, 'destroy'])->name('delete-order');

//Tài khoản
Route::get('admin/account', [App\Http\Controllers\api\AccountController::class, 'index'])->name('get-list-account');
Route::get('admin/all_Account', [App\Http\Controllers\api\AccountController::class, 'getAll'])->name('get-account');
Route::get('admin/findAccount/{ma}', [App\Http\Controllers\api\AccountController::class, 'show'])->name('find-account');
Route::post('admin/addAccount', [App\Http\Controllers\api\AccountController::class, 'store'])->name('add-account');
Route::post('admin/editAccount/{ma}', [App\Http\Controllers\api\AccountController::class, 'update'])->name('update-account');
Route::delete('admin/deleteAccount/{ma}', [App\Http\Controllers\api\AccountController::class, 'destroy'])->name('delete-account');

//user
  Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [App\Http\Controllers\UserController::class, 'register']);
Route::post('/login', [App\Http\Controllers\UserController::class, 'login']);
Route::get('/profile',[App\Http\Controllers\UserController::class, 'getAuthenticatedUser']);
Route::post('/changePassword/{email}',[App\Http\Controllers\api\AccountController::class, 'updatePassword']);
Route::middleware('auth:api')->get('/user', function(Request $request){
    return $request->user();
});
//sách 
Route::get('user/book', [App\Http\Controllers\api\BooksController::class, 'allbook'])->name('get-list-book-user');
Route::get('user/detail/{ma}', [App\Http\Controllers\api\BooksController::class, 'show'])->name('get-detail-book');
Route::get('user/listbook/{ma}', [App\Http\Controllers\api\BooksController::class, 'getlistbooktype'])->name('get-list-book-type');
Route::get('user/sortbook', [App\Http\Controllers\api\BooksController::class, 'sortBook'])->name('sort-book');
Route::get('user/getnewbook', [App\Http\Controllers\api\BooksController::class, 'getnewlistbooktype'])->name('get-new-book');
Route::get('user/getnewbook', [App\Http\Controllers\api\BooksController::class, 'getnewlistbooktype'])->name('get-new-book');
Route::get('user/getstate', [App\Http\Controllers\api\AddressController::class, 'state'])->name('getstate');
Route::get('user/getprovince', [App\Http\Controllers\api\AddressController::class, 'province'])->name('getprovince');
//Checkout
Route::post('user/order', [App\Http\Controllers\api\OrderController::class, 'storeOrder'])->name('addOrder');
Route::post('user/order_details', [App\Http\Controllers\api\OrderController::class, 'storeOrderDetail'])->name('addOrderDetail');
Route::get('user/getallorder', [App\Http\Controllers\api\OrderController::class, 'index'])->name('getallorder');
Route::get('user/getdetailsorder/{ma}', [App\Http\Controllers\api\OrderController::class, 'findOrderDetails'])->name('getallorder');
Route::delete('user/huyDonHang/{ma}', [App\Http\Controllers\api\OrderController::class, 'destroy'])->name('delete-order');
Route::post('user/danhan/{ma}', [App\Http\Controllers\api\OrderController::class, 'update'])->name('update-donhang');


//list 
Route::get('admin/all_categoryHead', [App\Http\Controllers\api\CategoriesController::class, 'getAll'])->name('get-category');
Route::get('admin/all_languageHead', [App\Http\Controllers\api\LanguagesController::class, 'getAll'])->name('get-language');
Route::get('admin/all_authorHead', [App\Http\Controllers\api\AuthorController::class, 'getAll'])->name('get-author');
Route::get('admin/all_publisherHead', [App\Http\Controllers\api\PublishersController::class, 'getAll'])->name('get-nxb');

//Count 
Route::get('admin/count_category', [App\Http\Controllers\api\CountController::class, 'getCountCategory'])->name('get-category');
Route::get('admin/count_author', [App\Http\Controllers\api\CountController::class, 'getCountAuthor'])->name('get-author');
Route::get('admin/count_publisher', [App\Http\Controllers\api\CountController::class, 'getCountPublisher'])->name('get-nxb');
Route::get('admin/count_accountemploy', [App\Http\Controllers\api\CountController::class, 'getCountAccountEmploy'])->name('get-nxb');
Route::get('admin/count_accountcustomer', [App\Http\Controllers\api\CountController::class, 'getCountAccountCustomer'])->name('get-nxb');
Route::get('admin/count_book', [App\Http\Controllers\api\CountController::class, 'getCountBook'])->name('get-nxb');
Route::get('admin/count_order', [App\Http\Controllers\api\CountController::class, 'getCountOrder'])->name('get-nxb');

