<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Catagories;
use App\Models\Order;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;

class CountController extends Controller
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
    public function getCountAccountEmploy(){
        return User::where('role','like', 'employee')->count();
    }
    public function getCountPublisher(){
        return Publisher::count();
    }
    public function getCountBook(){
        return Book::count();
    }
    public function getCountCategory(){
        return Catagories::count();
    }
    public function getCountOrder(){
        return Order::count();
    }
    public function getCountAuthor(){
        return Author::count();
    }
    public function getCountAccountCustomer(){
        return User::where('role', 'like', 'customer')->count();
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
