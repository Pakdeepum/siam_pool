<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\BankInformation;
use App\Order;
use App\ProductMaster;
use App\User;
use App\Delivery;
use Config;
use Log;
class BackendSilpController extends Controller
{
    /**
     *
     */
    public function index(){
        return view('BackendSilp.silp');
    }

    /**
     *
     */
    public function view(Request $request){
        try{
             $header = Order::with('customers')->groupBy('order_id')->where('deleted_at',null);
            if($request->has('key')){
                $header->where('order.order_id','like', '%' . $request->input('key') . '%');
            }
            $header = $header->get();

            foreach($header as $val){
                $val->status = Config::get('enum.product_status.'.$val->status);
                $val->send_type = Config::get('enum.delivery.'.$val->send_type);
                $val->paid_date = $val->paid_date = Carbon::parse($val->paid_date)->format('d/m/Y');
            }

            return response()->json(['success'=>true,'result'=> $header,'message'=>'successfully'],200);
        }catch(Exception $e){
            return response()->json(['success'=>false,'message'=>'these was has a problem.'],500);
        }
    }

    public function subView(Request $request){
        try{
           $content = Order::with('products')->where('order_id', $request->input('key'))->get();
           return response()->json(['success'=>true,'content'=> $content,'message'=>'successfully'],200);
       }catch(Exception $e){
           return response()->json(['success'=>false,'message'=>'these was has a problem.'],500);
       }
    }
    /**
     *
     */
    public function deleted(Request $requset){
        $id = Order::where('order_id',$requset->input('id'))->get();
        $trash = new Order;
        foreach($id as $val){
            $trash->find($val->id)->delete();
        }
        if($trash){
            return response()->json(['success'=>true,'message'=>'deleted successfully.'], 200);
        }
        return response()->json(['success'=>false,'message'=>'these was a problem.'], 500);
    }

    /**
     *
     */
    public function restored(Request $requset){
        $id = Order::withTrashed()->where('order_id',$requset->input('id'))->get();
        foreach($id as $val){
            Order::withTrashed()->find($val->id)->restore();
        }
        return response()->json(['success'=>true,'message'=>'restore successfully.'], 200);
    }

    /**
     *
     */
    public function approved(Request $request){
    //Log::Debug('approved request: ',$request);
        $order = Order::where('order_id', $request->input('orderId'))
                        ->where('status','=',1)->update([
                          'status'=>2
                        ]);
        if($order){
            // $order->status = 2;
            // $order = $order->save();
            return response()->json(['success'=> true, 'message'=>'successfully'],200);
        }
        return response()->json(['success'=> false,'message'=>'faild to update order.'],200);
    }

    /**
     *
     */
    public function trackCode(Request $request){
        $user = Order::with('user')->where('order_id', $request->input('key'))
                    ->with('customers')->get();
        $track = Delivery::all();
        if($user){
            return response()->json(['success'=>true,'message'=>'successfully','user'=>$user, 'track' => $track]);
        }
        return response()->json(['success'=>false,'message'=>'these was has a problem.']);
    }
}
