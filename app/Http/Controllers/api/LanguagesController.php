<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LanguageResource;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguagesController extends Controller
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
        $language = Language::orderBy('ma')->where('ma', 'like' , $Search_term)
        ->orWhere('name', 'like', $Search_term)
        ->paginate($Paginate);
        // if (isset($paginate)) {
        //     $author = Author::orderBy('ma')->paginate(3);
        // } else {
        //     $author = Author::orderBy('ma')->get();
        // }
        return LanguageResource::collection($language);
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
        $status = Language::create($data);
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
        $publisher = Language::where('ma', $ma)->get();
        if($publisher=='[]'){
            return 'Ngôn ngữ không tồn tại';
        }else{
            $data = $request->all();
            $publisher = Language::where('ma', $ma)->update($data);
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
        $post = DB::table('languages')->where('ma', $ma)->delete();
        return response()->json('The post successfully deleted');
    }
    public function getAll()
    {
        # code...
        // return CategoriesResource::collection(Catagories::select('ma','title')->get());
        return Language::select('ma','name')->get();
    }
}
