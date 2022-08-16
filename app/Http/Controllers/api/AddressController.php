<?php

namespace App\Http\Controllers\api;
use App\Models\Province;
use App\Models\State;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function province()
    {
        //
        $data = Province::orderBy('_name')->get();
        return $data;
        
    }
    public function state()
    {
        //
        $dataProvience['id'] = '%%';
        $Search_term = request('id','%%');
        if($Search_term != '%%'){
            $dataProvience = Province::where('_name','like', $Search_term)->first();
        }
        $data = State::orderBy('_name')->where('_province_id','like', $dataProvience['id'])->get();
        return $data;
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
