<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriesResource;
use App\Models\Catagories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
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
        $publisher = Catagories::orderBy('ma')->where('ma', 'like' , $Search_term)
        ->orWhere('title', 'like', $Search_term)
        ->orWhere('slug', 'like', $Search_term)
        ->orWhere('description', 'like', $Search_term)
        ->paginate($Paginate);
        // if (isset($paginate)) {
        //     $author = Author::orderBy('ma')->paginate(3);
        // } else {
        //     $author = Author::orderBy('ma')->get();
        // }
        return CategoriesResource::collection($publisher);
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
        $status = Catagories::create($data);
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
        $publisher = Catagories::where('ma', $ma)->get();
        if($publisher=='[]'){
            return 'Nhà xuất bản không tồn tại';
        }else{
            $data = $request->all();
            $publisher = Catagories::where('ma', $ma)->update($data);
            
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
        $post = DB::table('categories')->where('ma', $ma)->delete();
        return response()->json('The post successfully deleted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        # code...
        // return CategoriesResource::collection(Catagories::select('ma','title')->get());
        return Catagories::select('ma','title')->get();
    }
    public function getListByParent()
    {   
        $data = Catagories::getParentCategories();
        return CategoriesResource::collection($data);
        // return 'hello';
    }
    
}
