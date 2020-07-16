<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customers;
use DB;

class SigninController extends Controller
{
    private $_token;
    public function __construct()
    {
      // Unique Token
      $this->_token = uniqid(base64_encode(str_random(20)));
    }

    public function postLogin(Request $request){
        // Fetch User
        $user = User::where('email',$request->input('signin-email'))->first();
        // $custom = Customers::join('user','user.name');
        if($user){
            // Verify the password
            if(password_verify($request->input('signin-password'), $user->password)){
                // Update Token
                $postArray = ['access_token' => $this->_token];
                $login = User::where('email',$request->input('signin-email'))->update($postArray);

                if($login) {
                    $data = [
                        'name'  => $user->name,
                        'email' => $user->email,
                        'role'  => $user->roles,
                        'id'  => $user->id,
                    ];
                    session(['_signin' => $this->_token,'data' => $data]);
                    if (session()->has('paymentOldPath')) {
                      $pathPayment = session()->get('paymentOldPath');
                      session()->forget('paymentOldPath');
                     return response()->json(['success' => true,'session'=>$pathPayment,'fromPayment'=>true, 'message' => 'Login successfully' , 'data' => '']);
                   }
                    return response()->json(['success' => true,'fromPayment'=>false, 'message' => 'Login successfully' , 'data' => '']);
                  }
            }else{
                return response()->json(['success'=>false,'message' => 'Invalid password. please try again!', 'data' => 'password'],200);
            }
        }else{
            return response()->json(['success'=>false,'message' => 'Invalid email. please try again!', 'data' => 'email'],200);
        }
    }
    public function signinAdmin(Request $request){
        // Fetch User
        $user = User::where('email',$request->input('signin-email'))->first();
        // $custom = Customers::join('user','user.name');
        if($user){
            // Verify the password
            if(password_verify($request->input('signin-password'), $user->password)){
                // Update Token
                $postArray = ['access_token' => $this->_token];
                $login = User::where('email',$request->input('signin-email'))->update($postArray);

                if($login) {
                    $data = [
                        'name'  => $user->name,
                        'email' => $user->email,
                        'role'  => $user->roles,
                        'id'  => $user->id,
                    ];
                    session(['_signin' => $this->_token,'data' => $data]);
                    return response()->json(['success' => true, 'message' => 'Login successfully' , 'data' => $data]);
                  }
            }else{
                return response()->json(['success'=>false,'message' => 'Invalid password. please try again!', 'data' => 'password'],200);
            }
        }else{
            return response()->json(['success'=>false,'message' => 'Invalid email. please try again!', 'data' => 'email'],200);
        }
    }
}
