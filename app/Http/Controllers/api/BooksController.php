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
        ->orWhere('quantity', 'like', $Search_term)
        ->orWhere('price', 'like', $Search_term)
        ->orWhere('sold', 'like', $Search_term)
        ->orWhere('page_number', 'like', $Search_term)
        ->orWhere('publication_date', 'like', $Search_term)
        ->orWhere('reprint_date', 'like', $Search_term)
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
        $this->validate($request,[
            'ma' => 'required|string|max:10',
            'title'=> 'required|string|max:255',
            'slug'=> 'required|string|max:255',
            'price'=> 'required|integer|digits_between:1,1000',
            'quantity'=> 'required|integer|digits_between:1,1000',
            'page_number'=> 'required|integer|digits_between:1,10000',
            'publication_date'=> 'required|',
            'reprint_date'=> 'required|after:publication_date',
            'category_id'=> 'required',
            'language_id'=> 'required',
            'publisher_id'=> 'required',
            'author_id'=> 'required',
            'images'=> 'required',
        ]);
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
        $this->validate($request,[
            'ma' => 'required|string|max:10',
            'title'=> 'required|string|max:255',
            'slug'=> 'required|string|max:255',
            'price'=> 'required|integer|digits_between:1,1000',
            'quantity'=> 'required|integer|digits_between:1,1000',
            'page_number'=> 'required|integer|digits_between:1,10000',
            'publication_date'=> 'required|',
            'reprint_date'=> 'required|after:publication_date',
            'category_id'=> 'required',
            'language_id'=> 'required',
            'publisher_id'=> 'required',
            'author_id'=> 'required',
            'images'=> 'required',
        ]);
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
        return Book::get();
    }
}
