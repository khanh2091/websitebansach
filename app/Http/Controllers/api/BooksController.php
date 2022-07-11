<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Paginate = request('paginate',10);
        $Search_term = request('q','%%');
        $book = Book::orderBy('ma')->where('ma', 'like' , $Search_term)
        ->orWhere('title', 'like', $Search_term)
        ->orWhere('slug', 'like', $Search_term)
        ->orWhere('description', 'like', $Search_term)
        ->paginate($Paginate);
        // if (isset($paginate)) {
        //     $author = Author::orderBy('ma')->paginate(3);
        // } else {
        //     $author = Author::orderBy('ma')->get();
        // }
        return BookResource::collection($book);
        // return $publisher;
    }
    public function allbook()
    {
        //
        $Paginate = request('paginate',12);
        $Search_term = request('q','%%');
        $orderby = request('order', 'price');
        $book = Book::orderBy($orderby)->where('ma', 'like' , $Search_term)
        ->orWhere('title', 'like', $Search_term)
        ->orWhere('slug', 'like', $Search_term)
        ->orWhere('description', 'like', $Search_term)
        ->paginate($Paginate);
        // if (isset($paginate)) {
        //     $author = Author::orderBy('ma')->paginate(3);
        // } else {
        //     $author = Author::orderBy('ma')->get();
        // }
        return BookResource::collection($book);
        // return $publisher;
    }
    public function sortBook()
    {
        //
        $Paginate = request('paginate',12);
        $Search_term = request('q','%%');
        $orderby = request('order', 'price');
        $book = Book::orderBy($orderby)->where('ma', 'like' , $Search_term)
        ->orWhere('author_id', 'like', $Search_term)
        ->orWhere('language_id', 'like', $Search_term)
        ->orWhere('publisher_id', 'like', $Search_term)
        ->orWhere('category_id', 'like', $Search_term)
        ->paginate($Paginate);
        // if (isset($paginate)) {
        //     $author = Author::orderBy('ma')->paginate(3);
        // } else {
        //     $author = Author::orderBy('ma')->get();
        // }
        return BookResource::collection($book);
        // return $publisher;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //
        $data = $request->all();
        $status = Book::create($data);
        return $status;
        // return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $book = Book::where('ma', $id)->first();
        return $book;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ma)
    {
        //
        // return $request->all();
        $publisher = Book::where('ma', $ma)->get();
        if($publisher=='[]'){
            return 'Nhà xuất bản không tồn tại';
        }else{
            $data = $request->all();
            $publisher = Book::where('ma', $ma)->update($data);
            return 'sussess';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ma)
    {
        //
        $post = DB::table('products')->where('ma', $ma)->delete();
        return response()->json('The post successfully deleted');
    }
    public function find($ma){
        $post = Book::where('ma', $ma)->get();
        return BookResource::collection($post);
        // return "hello";
    }
    public function getAll(){
        return Book::get()->take(8);
    }
    public function getlistbooktype($ma){
        $data = Book::where('author_id', $ma)->take(3)->get();
        if($data == '[]'){
            $data = Book::where('category_id', $ma)->take(3)->get();
        }
        return $data;
    }
    public function getnewlistbooktype(){
        $data = Book::orderBy('updated_at')->take(3)->get();
        return $data;
    }
}
