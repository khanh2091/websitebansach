<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResoure;
use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class AuthorController extends Controller
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
        $Search_term = request('q', '%%');
        $author = Author::orderBy('ma')->where('ma', 'like' , $Search_term)
        ->orWhere('firstname', 'like', $Search_term)
        ->orWhere('lastname', 'like', $Search_term)
        ->orWhere('biography', 'like', $Search_term)
        ->paginate($Paginate);
        // // if (isset($paginate)) {
        // //     $author = Author::orderBy('ma')->paginate(3);
        // // } else {
        // //     $author = Author::orderBy('ma')->get();
        // // }
        return AuthorResoure::collection($author);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $status = Author::create($data);
        return $status;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ma)
    {
        $author = Author::where('ma', $ma)->get();
        if($author=='[]'){
            return 'Tác giả không tồn tại';
        }else{
            $data = $request->all();
            $author = Author::where('ma', $ma)->update($data);
            return 'Thành công';
        }
        // $data = $request->all();
        // $status = $author->fill($data)->save();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ma)
    {
        // $author = Author::where('ma', $ma)->get();

        $post = DB::table('authors')->where('ma', $ma)->delete();
        return response()->json('The post successfully deleted');
        // return $ma;
    }
    public function getAll()
    {
        # code...
        // return CategoriesResource::collection(Catagories::select('ma','title')->get());
        return Author::select('ma','firstname', 'lastname')->get();
    }
}
