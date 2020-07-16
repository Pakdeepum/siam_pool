<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use App\User;
use Log;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function index(){
      return view("Address.address")->render();
    }

    public function getAddress(Request $request){
      $_token = session()->get('_signin');
        $address = User::with('Customers')->where('access_token', $_token)->get();
        ///$address = User::with('Customers')->where('access_token', $_token)->select('customers.district_id')->get();
      $amphur_id = $address[0]->customers->amphur_id;
      $province_id = $address[0]->customers->province_id;
      $district_id = $address[0]->customers->district_id;
      $post_codes  = $address[0]->customers->postcode_id;
      // $amphur = amphur::where('aumphur_id','=',$amphur_id)->get();
      $amphur = DB::table('amphur')->where('amphur_id','=',$amphur_id)->select('amphur_name')->get();
      $district = DB::table('district')->where('district_code','=',$district_id)->select('district_name')->get();
      $province = DB::table('province')->where('province_id','=',$province_id)->select('province_name')->get();
      $post_codes = DB::table('post_codes')->where('id','=',$post_codes)->select('post_code')->get();

      Log::Debug('amphur_current',[$post_codes]);
      return response()->json(['success'=>true,'message'=>'successfully','data'=>$address,'amphur'=>$amphur,'district'=> $district,'province'=>$province,'post_codes'=>$post_codes]);
    }
}
