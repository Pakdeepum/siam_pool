<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use Carbon\Carbon;
use DB;
use App\Delivery;

class ProductInfoController extends Controller
{
    //
    public function index(){
        $charge = Delivery::where('status',1)->limit(1)->get();
        return view('ProductInfo.product-info')->with('charge',$charge)->render();
    }

    public function updateOrder(Request $request){
        $result = User::with('Order')->where('access_token', session()->get('_signin'))->get();
        $carbon = Carbon::now('Asia/Bangkok')->format('Ymd');

        $index = str_pad($this->gennerateKey(),4,'0',STR_PAD_LEFT);
        $orderID = $carbon.'HH'.$index;
        foreach($request->input('data') as  $index=>$val){
             $update = Order::create([
                "order_id" => $orderID,
                "customer_id" => $result[0]->id,
                "product_id" => $val['product_id'],
                "product_amount" => $val['amount'],
                "charge" => (float)$val['charge'],
                "delivery_address" => $val['dalivery'],
                "description" => $val['descriptions'],
                "send_type" => $val['sendType'],
                "updated_at" => Carbon::now('Asia/Bangkok')
            ]);
        }

        return response()->json(['success'=>true,'message'=>'successfully','data' =>  $update]);
    }

    private function gennerateKey(){
        $key = DB::table('gennerate_key')->get();
        $date = Carbon::parse($key[0]->updated_at,'Asia/Bangkok');
        $now = Carbon::now('Asia/Bangkok');

        $diff = $now->diffInDays($date);
        if($diff > 0){
            DB::table('gennerate_key')->where('id', 1)->update([
                "index" => 0,
                "updated_at" => Carbon::now('Asia/Bangkok')
            ]);
        }
        $row = DB::table('gennerate_key')->get();
        $index = $row[0]->index + 1;
        DB::table('gennerate_key')->where('id', 1)->update([
            "index" => $index,
            "updated_at" => Carbon::now('Asia/Bangkok')
        ]);
        return $index;
    }
}
