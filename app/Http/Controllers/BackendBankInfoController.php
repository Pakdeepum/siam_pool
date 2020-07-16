<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\BankInformation;

class BackendBankInfoController extends Controller
{
     /**
     *
     */
    public function index(Request $request){
        return view('BackendBankInfo.bank-info');
    }
    /**
     *
     */
    public function created(Request $request){
        try{
            $result = DB::table('bank_information')->insert([
                "account_name" => $request->input('account-name'),
                "account_number" => $request->input('account-number'),
                "bank_code" => $request->input('bank-name'),
                "created_at" => Carbon::now('Asia/Bangkok'),
                "updated_at" => Carbon::now('Asia/Bangkok')
            ]);
            if($result){
                return response()->json(['success'=>true,'message'=>'create bank information successfully'],200);
            }
        }catch(Exception $e){
           return response()->json(['success'=>false,'message'=>'these was has a problem create bank information.'],500);
        }
    }
    /**
     *
     */
    public function updated(Request $request){
        try{
            $update = BankInformation::where('id',$request->input('id'))->update([
                "account_name" => $request->input('account-name-edit'),
                "account_number" => $request->input('account-number-edit'),
                "bank_code" => $request->input('bank-name-edit'),
                "updated_at" => Carbon::now('Asia/Bangkok')
            ]);
            if($update){
                return response()->json(['success'=>true,'message'=>'update bank information successfully','data' => $update],200);
            }
        }catch(Exception $e){
           return response()->json(['success'=>false,'message'=>'these was has a problem update bank information.'],500);
        }
    }

    /**
     *
     */
    public function views(Request $request){
        try{
            $result = DB::table('bank_information')->join('bank_master','bank_master.bank_code',
            '=','bank_information.bank_code')->whereNull('deleted_at')->orderBy('bank_information.created_at','DESC')
            ->get(['bank_information.account_number as account_number',
                   'bank_information.account_name as account_name',
                   'bank_master.bank_name','bank_information.id as id',
                   'bank_master.bank_code as bank_code']);

            return response()->json(['success'=> true,'message'=>'successfully','data' => $result],200);
        }catch(Exception $e){
            return response()->json(['success'=> false,'message' => 'thses was has a problem.'],200);
        }
    }
    /**
     *
     */
    public function getBankInfo(Request $request){
        try{
            $result = DB::table('bank_master')->get();
            return response()->json(['success'=> true,'message'=>'successfully','data' => $result],200);
        }catch(Exception $e){
            return response()->json(['success'=> false,'message' => 'thses was has a problem.'],200);
        }
    }

        /**
     *
     */
    public function deleted(Request $requset){
        $id = BankInformation::where('id',$requset->input('id'))->get();
        $trash = new BankInformation;
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
        $id = BankInformation::withTrashed()->where('id',$requset->input('id'))->get();
        foreach($id as $val){
            BankInformation::withTrashed()->find($val->id)->restore();
        }
        return response()->json(['success'=>true,'message'=>'restore successfully.'], 200);
    }

}
