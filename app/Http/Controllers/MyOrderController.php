<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\BankInformation;
use App\Order;
use Illuminate\Support\Facades\Validator;
class MyOrderController extends Controller
{
    /**
     *
     */
    public function index($id){
        $now = Carbon::now('Asia/Bangkok');
        $order_id = Order::select('order_id')->where('customer_id','=',$id)
        ->where('created_at', '>', $now->subDay(1))
        ->distinct()
        ->get();
        //dd($order_id);
        /**
         * bank information.
         */
        /**
         * order information.
         */
         // return response()->json(['order_id'=>$order_id]);
        // return response()->json(['success'=>true,'data'=>$order_id,'customer_id'=>$id]);
        return view('MyOrder.myOrder')->with(['order_id'=>$order_id,'customer_id'=>$id]);
    }
    public function getOrderById(string $order_id){
        try{
          $now = Carbon::now('Asia/Bangkok');
          //$difference = ($created->diff($now)->days < 1);
            $order = Order::join('product_master','product_master.id_product','=','order.product_id')
            ->where('order.order_id',$order_id)
            ->distinct()
            ->where('created_at', '>', $now->subDay(1))//for created_date less than 24 hours from now then show
            // ->where(function ($query) {
            //     $query->orwhere('order.status','>=', 2);
            // })
            // ->orWhere('order.status','>=', 1)
            // ->whereRaw("DATEDIFF(".$now->toDateTimeString().",'created_at')<1")
            ->get(['order.id','order.order_id','order.product_amount','product_master.price', 'order.charge',
                    DB::raw("(product_master.price * order.product_amount) + order.charge as total"),
                   'product_master.id_product','product_master.product_name','product_master.id_category_product', 'product_master.pic1_url', 'product_master.id_product as id']);
            return response()->json(['success'=>true,'data'=>$order]);
        }catch(Exception $e){
            return response()->json(['success'=>false,'message' => 'these was has a problem.']);
        }
    }
    /**
     * Identity silp and active order has paid
     */
    public function updateOrder(Request $request){
        $order_id = \str_replace("\"","",$request->input('order-id'));
        $val = $request->input('paid');
        $price = strpos($val, ',') ? str_replace(',','',$val) : $val;
        try{

            $destination = public_path('storage/silp/');
            /**validate file type */
            $rules = [
                'silp' => 'required',
                'silp.*' => 'mimes:jpeg,png,jpg,bmp,gif,svg',
            ];
            $messages = [
                'required' => 'The Image file is required!',
                'mimes' => 'The Image mimes type Invalid'
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                Log::error($validator->errors()->all());
                return response()->json(['success'=>false,
                'message' => $validator->getMessageBag()->toArray()],400);
            }
            /**move image file */
            if($request->hasFile('silp')){
                $file = $request->file('silp');
                /**create new the image name*/
                $image = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).time();
                $image = base64_encode($image);
                $image = $image.'.'.$file->getClientOriginalExtension();
                if(!$file->move($destination, $image)){
                    return response()->json(['success'=>false,'message'=>'these was has problem a upload image file.'], 400);
                }

                $update = Order::where('order_id',$order_id)->update([
                    "slip_image" => $image,
                    "paid_date" => $request->input('date_upload'),
                    "paid_price" => (float)$price,
                    'paid_bank' => $request->input('_payment'),
                    "status" => 1,
                    "updated_at" => Carbon::now('Asia/Bangkok')
                ]);
            }
            if($update){
                return response()->json(['success'=>true,'message'=>'successfully'],200);
            }
            return response()->json(['success'=>false,'message'=>'data not found.'],204);
        }catch(Exception $e){
            return response()->json(['success'=>false,'message' => 'these was has a problem.']);
        }
    }

    /**
     * get order by order id
     * @param $request->input('key')
     * @return json('order')
     */
    public function getOrder(Request $request){
        try{
          $now = Carbon::now('Asia/Bangkok');
          //$difference = ($created->diff($now)->days < 1);
            $order = Order::join('product_master','product_master.id_product','=','order.product_id')
            ->where('order.order_id',$request->input('key'))
            ->where('order.status','!=', 1)
            ->where('created_at', '>', $now->subDay(1))//for created_date less than 24 hours from now then show
            // ->where(function ($query) {
            //     $query->orwhere('order.status','>=', 2);
            // })
            // ->orWhere('order.status','>=', 1)
            // ->whereRaw("DATEDIFF(".$now->toDateTimeString().",'created_at')<1")
            ->get(['order.id','order.order_id','order.product_amount','product_master.price', 'order.charge',
                    DB::raw("(product_master.price * order.product_amount) + order.charge as total"),
                   'product_master.id_product','product_master.product_name','product_master.id_category_product', 'product_master.pic1_url', 'product_master.id_product as id']);
            return response()->json(['success'=>true,'data'=>$order]);
        }catch(Exception $e){
            return response()->json(['success'=>false,'message' => 'these was has a problem.']);
        }
    }
}
