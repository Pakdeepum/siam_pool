<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delivery;
use Carbon\Carbon;
use DB;
class BackendDeliveryController extends Controller
{
    /**
     * 
     */
    public function index(){
        return view('BackendDelivery.delivery');
    }

    /**
     * 
     */
    public function created(Request $request){
        $val = $request->input('service-charge');
        $price = strpos($val, ',') ? str_replace(',','',$val) : $val;

        $result = Delivery::create([
            "service" => $request->input('service-name'),
            "service_url" => $request->input('service-url'),
            "service_charge" => (float)$price,
            "updated_at" => Carbon::now('Asia/Bangkok')
        ]);
        if(!$result){
            return response()->json(['success'=>false, 'message'=>'these was has a problem.']);
        }
        return response()->json(['success'=>true, 'message'=>'successfully']);
    }

    /**
     * 
     */
    public function viewed(){
        $result = Delivery::all();
        if(!$result){
            return response()->json(['success'=>false, 'message'=>'these was has a problem.']);
        }
        return response()->json(['success'=>true, 'message'=>'successfully', 'data'=>$result]);
    }

    /**
     * 
     */
    public function updated(Request $request){
        DB::table('delivery')->update(array('status' => 0));
        
        $id = $request["data"]['id'];
        $result = Delivery::where('id', $id)->first();

        if($result){
            $result->status = 1;
            $result = $result->save();
            return response()->json(['success'=> true, 'message'=>'successfully'],200);
        }
        return response()->json(['success'=> false,'message'=>'faild to update order.'],200);
    }
     /**
     * 
     */
    public function deleted(Request $request){
        $id = Delivery::where('id',$request->input('id'))->get();
        $trash = new Delivery;
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
    public function restored(Request $request){
        $id = Delivery::withTrashed()->where('id',$request->input('id'))->get();
        foreach($id as $val){
            Delivery::withTrashed()->find($val->id)->restore();
        }        
        return response()->json(['success'=>true,'message'=>'restore successfully.'], 200);
    }
}
