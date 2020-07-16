<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use Carbon\Carbon;
use DB;

class AcceptPaymentController extends Controller
{
    public function index(Request $request){
      $session = session()->get('_signin');
      $order = $request->input('order_id');
      $result = User::join('order','order.customer_id','=','users.id')
      ->join('product_master','product_master.id_product','=','order.product_id')
      ->where('order.order_id',$order)->where('users.access_token', $session)->get();
     
      $customer_id = Order::where('order_id',$order)->select('customer_id')->get();
      //$order_all = Order::where('customer_id','=',$customer_id)->select('order_id');
      $total = 0;
      $charge = 0;
      foreach($result as $val){
        $val->price = ($val->price * $val->product_amount);
        $total = $total + $val->price;
        $charge = $val->charge;
      }
      $total = $total + $charge;
      $add3Day = Carbon::now('Asia/Bangkok')->addDays(1);
      return view('AcceptPayment.accept-payment')->with(['order' => $order, 'total' => $total,'result' => $result,'_day' => $add3Day,'customer_id'=>$customer_id]);
    }
}
