<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Special;
use Illuminate\Support\Facades\Validator;
use File;

class BackendSpecialController extends Controller
{
    /**
     * view index
     */
    public function index(){
        return view('BackendSpecial.special');
    }
    /**
     * view all promotion
     */
    public function view(Request $request){
        $result = Special::orderBy('created_at','DESC');
        if($request->has('key')){
            $result->where('special_name', 'like', '%' . $request->input('key') . '%');
        }
        $result = $result->get();
        return response()->json(['success'=> true, 'message' => 'successfully', 'result' => $result]);
    }
    /**
     * 
     */
    public function updated(Request $request){
        //return response()->json($request);
        $image = null;
        if($request->hasFile('image_promotion_edit')){
            $oldFile = '/storage/special/'.$request->input('oldFile');
            /**delete old file */
            if(file_exists(public_path($oldFile))){
                File::delete(public_path($oldFile ));  
            }
            $file = $request->file('image_promotion_edit');
            /**create new the image name*/
            $image = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).time();
            $image = base64_encode($image);
            $image = $image.'.'.$file->getClientOriginalExtension();
            if(!$file->move(public_path('storage/special/'), $image)){
                return response()->json(['success'=>false,'message'=>'these was has problem a upload image file.'], 200);
            }
        }else{
            $image = $request->input('oldFile');
        }
        /**insert data to DB. */
        $result = Special::where('id',$request->input('_id'))->update([
            'special_name' => $request->input('special_name_edit'),
            'discount' => $request->input('special_discount_edit'),
            'special_image' => $image,
        ]);
        return response()->json(['success'=>true,'message'=>'successfully add promotion', 'result'=>$result], 200);
    }
    /**
     * 
     */
    public function deleted(Request $requset){
        $id = Special::where('id',$requset->input('id'))->get();
        $trash = new Special;
        foreach($id as $val){
            $trash->find($val->id)->delete();
        }
        if($trash){
            return response()->json(['success'=>true,'message'=>'deleted successfully.'], 200);
        }
        return response()->json(['success'=>false,'message'=>'these was a problem.'], 200);
    }

    /**
     * 
     */
    public function restored(Request $requset){
        $id = Special::withTrashed()->where('id',$requset->input('id'))->get();
        foreach($id as $val){
            Order::withTrashed()->find($val->id)->restore();
        }        
        return response()->json(['success'=>true,'message'=>'restore successfully.'], 200);
    }
    /**
     * add promotions
     */
    public function created(Request $request){
        $destination = public_path('storage/special/');
        /**validate file type */
        $rules = [
            'image_promotion' => 'mimes:jpeg,png,jpg,bmp,gif,svg | required',
        ];
        $messages = [
            'required' => 'The Image file is required!',
            'mimes' => 'The Image mimes type Invalid'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
             return response()->json(['success'=>false, 'message' => $validator->getMessageBag()->toArray()],200);
        }
        /**move image file */
        if($request->hasFile('image_promotion')){
            $file = $request->file('image_promotion');
            /**create new the image name*/
            $image = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).time();
            $image = base64_encode($image);
            $image = $image.'.'.$file->getClientOriginalExtension();
            if(!$file->move($destination, $image)){
                return response()->json(['success'=>false,'message'=>'these was has problem a upload image file.'], 200);
            }

            /**insert data to DB. */
            $result = Special::create([
                'special_name' => $request->input('special_name'),
                'discount' => $request->input('special_discount'),
                'special_image' => $image,
            ]);
        } 
        return response()->json(['success'=>true,'message'=>'successfully add promotion', 'result'=>$result], 200);
    }
}
