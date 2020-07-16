<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class BackendUserController extends Controller
{
    /**
     *
     */
    public function index(){
        return view('BackendUser.user');
    }

    /**
     *
     */
    public function getUser(Request $request){
        $key = $request->input('key');
        $result ;
        $searchResult =[];
        if($request->has('key')){
            $key = $request->input('key');
            $result = User::with(['customers' => function ($query) use ($key) {
                $query->where('customers.name','like', '%' . $key . '%');
                $query->orWhere('customers.lastname','like', '%' . $key . '%');
            }])->get();
            for($i=0;$i<count($result);$i++){
              if($result[$i]->customers!=null){
                array_push($searchResult,$result[$i]);
              }
            }

            return response()->json(['success'=>true,'message'=>'successfully','result'=>$searchResult]);
        }

        $result = User::with('customers');
        $result = $result->get();
        if($result){
            return response()->json(['success'=>true,'message'=>'successfully','result'=>$result]);
        }
        return response()->json(['success'=>false,'message'=>'these was has a problem']);
    }

    /**
     *
     */
    public function userDelete(Request $request){
        $id = User::where('id',$request->input('id'))->get();
        $trash = new User;
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
    public function userRestore(Request $request){
        $id = User::withTrashed()->where('id',$requset->input('id'))->get();
        foreach($id as $val){
            User::withTrashed()->find($val->id)->restore();
        }
        return response()->json(['success'=>true,'message'=>'restore successfully.'], 200);
    }
}
