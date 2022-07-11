<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccoutResource;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
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
        $book = Account::orderBy('firstname')->where('email', 'like' , $Search_term)
        ->orWhere('lastname', 'like' , $Search_term)
        ->orWhere('firstname', 'like' , $Search_term)
        ->paginate($Paginate);
        // if (isset($paginate)) {
        //     $author = Author::orderBy('ma')->paginate(3);
        // } else {
        //     $author = Author::orderBy('ma')->get();
        // }
        return AccoutResource::collection($book);

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
    public function show($email)
    {
        //
        $data = Account::where('email', $email)->first();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {
        //
        $data = $request->all();
        $taikhoan = Account::where('email', $email)->update($data);
        return 'sussess';
    }
    public function updatePassword(Request $request, $email){
        $data = ['password' => Hash::make($request->get('password'))];
        $taikhoan = Account::where('email'. ' = ', $email)->update($data);
        return $taikhoan;
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
