<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OderDetailResource;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderDetail;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $idUser = request('user','%%');
        $data = Order::orderBy('updated_at')->where('user_id','like', $idUser)->get();
        return $data;
    }
    public function allorder()
    {
        //
        $Paginate = request('paginate',10);
        $Search_term = request('q','%%');
        $data = Order::orderBy('updated_at')->where('order_number', 'like' , $Search_term)
        ->orWhere('firstname', 'like', $Search_term)
        ->orWhere('lastname', 'like', $Search_term)
        ->orWhere('address', 'like', $Search_term)
        ->paginate($Paginate);
        return $data;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrder(Request $request)
    {
        
        $data = $request->all();
        $status = Order::create($data);
        return $status;
    }
    
    public function storeOrderDetail(Request $request){
        $data = $request->all();
        $product = Book::where('ma', '=' ,$data['product_id'])->first();
        if($product['quantity'] >= $data['quantity']){
            $product = Book::where('ma', '=' ,$data['product_id'])->decrement('quantity', $data['quantity']);
            $status = OrderDetail::create($data);
            return $status;
        }
        else{
            $post = DB::table('orders')->where('order_number', $data['order_id'])->delete();
            return 'Số lượng không đủ';
        }
    }
    public function findOrderDetails($ma){
        $tamp = (integer) $ma;
        $data = OrderDetail::where('order_id', '=' ,$tamp)->get();
        return OderDetailResource::collection($data);
        // return $ma;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ma)
    {
        //
        $data = Order::where('order_number', $ma)->first();
        return $data;
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
        $data = $request->all();
        $data1 = OrderDetail::where('order_id', '=' , $ma)->get();
        foreach ($data1 as $item) {
            $product = Book::where('ma', '=' ,$item['product_id'])->increment('quantity', $item['quantity']);
        }
        $donhang = Order::where('order_number', $ma)->update($data);
        return $donhang;
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
        $lydohuy = request('lydohuy','');
        $data = OrderDetail::where('order_id', '=' , $ma)->get();
        // foreach ($data as $item) {
        //     $product = Book::where('ma', '=' ,$item['product_id'])->increment('quantity', $item['quantity']);
        // }
        // $donhang = Order::where('order_number', $ma)->update($lydohuy);
        return $data;
    }
}
