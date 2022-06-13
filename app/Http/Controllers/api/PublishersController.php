<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PublisherResoure;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublishersController extends Controller
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
        $Search_term = request('q','');
        $publisher = Publisher::orderBy('ma')->where('ma', 'like' , $Search_term)
        ->orWhere('name', 'like', $Search_term)
        ->orWhere('description', 'like', $Search_term)
        ->paginate($Paginate);
        // if (isset($paginate)) {
        //     $author = Author::orderBy('ma')->paginate(3);
        // } else {
        //     $author = Author::orderBy('ma')->get();
        // }
        return PublisherResoure::collection($publisher);
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
        $status = Publisher::create($data);
        return $status;
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
        $publisher = Publisher::where('ma', $ma)->get();
        if($publisher=='[]'){
            return 'Nhà xuất bản không tồn tại';
        }else{
            $data = $request->all();
            $publisher = Publisher::where('ma', $ma)->update($data);
            return 'Thành công';
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
        $post = DB::table('publishers')->where('ma', $ma)->delete();
        return response()->json('The post successfully deleted');
    }
    public function getAll()
    {
        # code...
        // return CategoriesResource::collection(Catagories::select('ma','title')->get());
        return Publisher::select('ma','name')->get();
    }
}
