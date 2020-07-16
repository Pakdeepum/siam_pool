<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Customers;
use DB;
use Mail;
use Log;
class SignupController extends Controller
{
    /**
     * @param request data resgiter customer.
     * @return json response result create customer.
     */
    public function created(Request $request){
        $user = User::where('email',$request->input('signup-email'))->first();
        if($user){
            return response()->json(['success'=>false,'message' => 'this email has already. please try again!'],200);
        }
        /** prepare data*/
        $name = $request->input('signup-name');
        $lastname = $request->input('signup-lastname');
        $email = $request->input('signup-email');
        $phone = $request->input('signup-tel');
        $phoneCode =$request->input('signup-conutry-code');
        $pwd = $request->input('signup-confirm');

        $address = $request->input('signup-address');
        $amphur = $request->input('signup-amphur');
        $district = $request->input('signup-district');
        $postcode = $request->input('signup-postcode');
        $province = explode(",", strval($request->input('signup-province')));
        $geo_id = intval($province[1]);
        // Log::Debug('request signup',[$geo_id]);
        //  return;
        $u = User::create([
            'username' => uniqid(base64_encode(str_random(5))),
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($pwd),
            'roles' => 4
        ]);
        Customers::create([
            'id' => $u->id,
            'name' => $name,
            'lastname' => $lastname,
            'tel' => $phone,
            'phone_code' => $phoneCode,
            'province_id' =>$province[0],
            'district_id' =>$district,
            'amphur_id' =>$amphur,
            'postcode_id'=>$postcode,
            'geo_id' => $geo_id,
            'address'=>  $address,
        ]);

        $template_path = 'singup-mail';
        $mailadmin = config('mail.recevice.address');
        $sendTo = str_replace("\xE2\x80\x8B", "", $mailadmin);

        $mail = [
            'customer' => $name.' '.$lastname,
         ];

        /**send mail */
        Mail::send($template_path,  $mail , function($message)use($sendTo) {
            // Set the sender
            $message->from(config('mail.from.address'),'POOLSHOPBKK');
            // Set the receiver and subject of the mail.
            $message->to($sendTo ,'Receiver Name')->subject('Register User');
        });

        return response()->json(['success'=>true,'message'=>'register user successfully']);
    }

    /**
     * @return json response country data.
     */
    public function getConutryCode(){
        $result = DB::table('country')->orderBy('iso','ASC')->get();
        return response()->json(['success'=>true,'data'=>$result]);
    }
    public function getProvince(Request $request){
        $province = DB::table('province')->get();
        return response()->json($province);
    }
    /**
     *
     */
    public function getAumphar(Request $request){
        $province = explode(",", $request->input('province_id'));
        $aumphar = DB::table('amphur')->where('province_id',$province[0])->where('geo_id',$province[1])->get();
        return response()->json($aumphar);
    }
    /**
     *
     */
    public function getDistict(Request $request){
        $aumphar = $request->input('amphur_id');
        $district = DB::table('district')->where('amphur_id',$aumphar)->get();
        return response()->json($district);
    }
    /**
     *
     */
    public function getPostCode(Request $request){
        $district = $request->input('district_id');
        $postcode = DB::table('post_codes')->where('district_code',$district)->get();
        return response()->json($postcode);
    }
}
