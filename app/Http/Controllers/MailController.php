<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use Carbon\Carbon;
use DB;
use App\User;
use Log;
class MailController extends Controller {

   public function contactMail(Request $request) {
      $template = 'contactMail';
      $sendTo = config('mail.recevice.address');
      $sendTo = str_replace("\xE2\x80\x8B", "", $sendTo);

      $mail = [
         'name'=> $request->input('name'),
         'email'=> $request->input('email'),
         'bodyMessage'=> $request->get('message'),
      ];
      /**send mail */
      Mail::send($template,  $mail , function($message)use($sendTo) {
         // Set the sender
         $message->from(config('mail.from.address'),'POOLSHOPBKK');
         // Set the receiver and subject of the mail.
         $message->to($sendTo ,'Receiver Name')->subject('email ติดต่อ.');
      });

      return  response()->json(['success'=>true,'message'=>'send email successfully']) ;
   }

   /**send mail */
   public function htmlmail(Request $request)
   {
      // Path or name to the blade template to be rendered
      $template_path = 'notifications';
      $sendTo = config('mail.recevice.address');
      $sendTo = str_replace("\xE2\x80\x8B", "", $sendTo);

      /**Query data */
      $_order = $request->input('order_id');
      $data = $this->getInformation($_order);
      $mail = [
            'bank'=> $data[0]->bank_name,
            'date'=> $data[0]->paid_date,
            'price'=> $data[0]->paid_price,
            'order_id'=> $data[0]->order_id,
            'premise'=> 'storage/silp/'.$data[0]->slip_image,
            'name'=> $data[0]->name,
            'tel'=> $data[0]->tel,
            'address'=> $data[0]->address
         ];

      /**send mail */
      Mail::send($template_path,  $mail , function($message)use($sendTo) {
            // Set the sender
            $message->from('no-reply@poolshopbkk.com','POOLSHOPBKK');
            // Set the receiver and subject of the mail.
            $message->to($sendTo ,'Receiver Name')->subject('email แจ้งการชำระเงิน.');
      });

      return  response()->json(['success'=>true,'message'=>'send email successfully']) ;
   }
   public function resetPassword(Request $request){
      // Path or name to the blade template to be rendered
      $template_path = 'resetpwd';
      $sendTo = $request->input('forgot-email');
      $sendTo = str_replace("\xE2\x80\x8B", "", $sendTo);

      /**Query data */
      $user = User::where('email',$sendTo)->first();
      $newpwd = uniqid(base64_encode(str_random(5)));
      if($user){
         $mail = [
            'password'=> $newpwd,
         ];

         /**send mail */
         Mail::send($template_path,  $mail , function($message)use($sendTo) {
               // Set the sender
               $message->from(config('mail.from.address'),'POOLSHOPBKK');
               // Set the receiver and subject of the mail.
               $message->to($sendTo ,'Receiver Name')->subject('email reset your password.');
         });
         $newpwd = [
            'password'=> Hash::make($newpwd),
         ];
         User::where('email',$sendTo)->update($newpwd);
         return  response()->json(['success'=>true,'message'=>'send email successfully']) ;
      }
      return  response()->json(['success'=>false,'message'=>'this email is empty']) ;
   }
   /**Query data */
   public function getInformation($order_id){
      try{
         $result = Order::join('bank_master as bank','bank.bank_code','=','order.paid_bank')
         ->join('customers','customers.id','=','order.customer_id')
         ->join('product_master','product_master.id_product','=','order.product_id')
         ->where('order.order_id',$order_id)
         ->groupBy('order.order_id')
         ->get(['bank.bank_name', 'order.paid_date','order.paid_price','order.order_id','order.slip_image',
                DB::raw("CONCAT(customers.name,' ',customers.lastname) as name"), 'customers.tel',
                'customers.address',DB::raw("group_concat(product_master.product_name) as product_name")]);
          foreach($result as $val){
             $val->paid_date = $val->paid_date = Carbon::parse($val->paid_date)->format('d/m/Y');
          }
      }catch(Exception $e){

      }
      return $result;
   }

    /**tracking number send mail */
    public function trackMail(Request $request)
    {
        //return response()->json($request->input('data')['sendemail']);
       // Path or name to the blade template to be rendered
       //echo "<script>console.log('trackMail data in trackmail')</script>";
       $template_path = 'track-number';

       $to = $request->input('data')['email'];
       //echo "<script>console.log('trackMail data ',$to)</script>";
       $to = str_replace("\xE2\x80\x8B", "", $to);
       $track = $request->input('data')['track'];
       $url = $request->input('data')['url'];
       $customer = $request->input('data')['customer'];
       $tel = config('mail.tel.number');
       $mail = [
             'number'=> $track,
             'url' => $url,
             'tel' => $tel,
             'customer' => $customer
          ];
       /**send mail */
       Mail::send($template_path,  $mail , function($message)use($to,  $customer) {
             // Set the sender
             $message->from(config('mail.from.address'),'POOLSHOPBKK');
             // Set the receiver and subject of the mail.

             //$message->to($sendTo ,'Receiver Name')->subject('Tracking Number สำหรับติดตามสินค้า.');

             $message->to($to , $customer)->subject('Tracking Number สำหรับติดตามสินค้า.');

       });
       Log::Debug('trackMail :$mail:',$mail);
       Log::Debug('trackMail :$to:',[$to]);
       return  response()->json(['success'=>true,'message'=>'send email successfully','send_to'=>$to,'mail_data'=>$mail]) ;
    }

        /** order id send mail */
        public function orderMail(Request $request)
        {
           // Path or name to the blade template to be rendered
           $template_path = 'order-mail';
           $mailcustomer = $request->input('email');
           $mailadmin = config('mail.recevice.address');
           $mailcustomer = str_replace("\xE2\x80\x8B", "", $mailcustomer);
           $mailadmin = str_replace("\xE2\x80\x8B", "", $mailadmin);
           $sendTo = [$mailcustomer,$mailadmin];
           $orderID = $request->input('order');
           $detail = $this->getProduct($orderID);
           $product = [];
           $total = 0;
           $charge = 0;
         //   $customerID=3;
         //   $customerID = Order::find($request->input('order'))->select('customer_id')->get();
         //   \Log::info(' customerID:',$customerID->customer_id);
         //   \Log::info(' order ID ',$orderID);
           foreach ($detail as $key => $value) {
              # todo
              $product[$key] = $value;
              $charge = $product[$key]['charge'];
              $total = $total + ($product[$key]['product_amount'] * $product[$key]['products'][0]['price']);// $value[$key]['price'];  products
           }
           $total = $total + $charge;
           $mail = [
                 'order_id'=> $orderID,
                 'customer_id'=>$detail[0]->customers['id'],
                 'tel' => config('mail.tel.number'),
                 'customer' => $detail[0]->customers['name'].' '.$detail[0]->customers['lastname'],
                 'date' => Carbon::now('Asia/Bangkok')->format('d/m/Y'),
                 'product' => $product,
                 'total' => $total
              ];
           /**send mail */
           Mail::send($template_path,  $mail , function($message)use($sendTo) {
                 // Set the sender
                 $message->from(config('mail.from.address'),'POOLSHOPBKK');
                 // Set the receiver and subject of the mail.
                 $message->to($sendTo ,'Receiver Name')->subject('ยืนยันการทำรายการสั่งซื้อสินค้า.');
           });

           return  response()->json(['success'=>true,'message'=>'send email successfully']) ;
        }

        /**Query data */
   public function getProduct($order_id){
      try{
         $result = Order::with(array('customers'=>function($query){
                              $query->select('id','name','lastname');
                           })
                        )->with(array('products' => function($query){
                           $query->select('id_product','product_name','price');
                        })
                     )->where('order_id',$order_id)->get();
      }catch(Exception $e){

      }
      return $result;
   }
}
