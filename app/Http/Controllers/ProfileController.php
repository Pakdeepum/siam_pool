<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Customers;
use App\User;
use DB;
class ProfileController extends Controller
{
    /**
     * @return view
     */
    public function index(){
        /**phone code */
        $country = DB::table('country')->get();
        /**profile */
        $session = session()->get('_signin');
        $profile = User::with('Customers')->where('access_token',$session)->get();
        /**province */
        $province = DB::table('province')->get();
        //return response()->json($profile);
        return view("Profile.profile")->with([
            'country'=>$country,
            'profile' => $profile,
            'province'=>$province]);
    }
    /**
     *
     */
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

    /**
     *
     */
    public function updateProfile(Request $request){
        $geo = explode("," , $request->input('profile-province'));
        $rules =
        [
            'profile-password' => 'required'
        ];
        $v = Validator::make($request->all(), $rules);

        $user = User::with('Customers')->find($request->input('profile-id'));
        $user->email = $request->has('profile-email') ? $request->input('profile-email') : $user->email;
        $user->password =  $v->fails() ? $user->password : Hash::make($request->input('profile-password'));
        $user->name = $request->has('profile-name') ? $request->input('profile-name'): $user->name;

        $user->customers->name = $request->has('profile-name') ? $request->input('profile-name'): $user->customers->name ;
        $user->customers->lastname = $request->has('profile-lastname') ? $request->input('profile-lastname'): $user->customers->lastname;
        $user->customers->tel = $request->has('profile-tel') ? $request->input('profile-tel'): $user->customers->tel;
        $user->customers->address = $request->has('profile-address') ? $request->input('profile-address'): $user->customers->address ;
        $user->customers->province_id = $request->has('profile-province') ? $geo[0]: $user->customers->province_id;
        $user->customers->geo_id = $request->has('profile-province') ? $geo[1] : $user->customers->geo_id;
        $user->customers->district_id = $request->has('profile-district') ? $request->input('profile-district'): $user->customers->district_id;
        $user->customers->amphur_id = $request->has('profile-aumphar') ? $request->input('profile-aumphar'): $user->customers->amphur_id ;
        $user->customers->postcode_id = $request->has('profile-postCode') ? $request->input('profile-postCode'): $user->customers->postcode_id;
        $user->customers->phone_code = $request->has('profile-conutry-code') ? $request->input('profile-conutry-code'): $user->customers->phone_code;
        $user->customers->full_address = $request->input('profile-address').' '.$request->input('district-tmp').' '.$request->input('aumphar-tmp')
        .' '.$request->input('province-tmp').' '.$request->input('postCode-tmp');
        $user->customers->save();
        $user = $user->save();

        return response()->json(['success'=>true,'message'=>'successfully']);
    }
}
