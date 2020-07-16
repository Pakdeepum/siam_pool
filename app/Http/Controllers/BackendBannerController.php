<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use File;

class BackendBannerController extends Controller
{
    /**view banner main */
    public function index(){
        session()->flash('load','load');
        return view('BackendBanner.banner');
    }
    /**list carosal to table */
    public function ListCarousal(){
        $carousal = DB::select('select * from carousel Order by created_at DESC');
        return response()->json($carousal);
    }
    /**delete carosal */
    public function DeleteCarousal(Request $request, $id){
        $path = public_path('storage/banner/');
        try{
            $lists = DB::select('select * from carousel where id = ?', [$id]);
            if($lists){
                foreach($lists as $list){
                    if(file_exists($path.$list->carousel_path)){
                        File::delete($path.$list->carousel_path);
                    }
                    $del = DB::delete('delete from carousel where id = ? ',[$id]);
                }
                session()->flash('status', 'Deleteing Banner Successfully');
                return response()->json(['status' => 'Deleteing Banner Successfully']);
            }else{
                session()->flash('error', '404 file not found');
                return response()->json(['error' => '404 file not found']);
            }
        }catch(Exception $e){
            session()->flash('error', 'these was a probleam delete files.');
            return response()->json(['error' => 'these was a probleam delete files.']);
        }
    }
    /**select for edit */
    public function SelectCarousal(Request $request, $id){
        $imageID = DB::select('select * from carousel where id = ? ', [$id]);
        return response()->json($imageID);
    }
    /**save edit */
    public function EditBanner(Request $request){
        $path = public_path('storage/banner/');
        $id = $request->input('id');
        /**validate file type */
        $rules = [
            'file' => 'mimes:jpeg,png,jpg,bmp,gif,svg | required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Log::error($validator->errors()->all());  
            return redirect('/BackendBanner')->withErrors($validator); 
        }  
        /**delete old image. */
        $image = DB::select('select * from carousel where id = ? ', [$id]);
        foreach($image as $val){
            if (file_exists($path.$val->carousel_path)) {
                Log::notice("these was a problem files is delete.");       
                try{
                    File::delete($path.$val->carousel_path);
                }catch(Exception $e){
                    Log::error('file image banner has delete probleam.');
                    return redirect('/BackendBanner')->with('error', 'these was a probleam adding banner!');
                }            
            }
        }
        /**image update path*/        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            /**create new the image name*/
            $nameImage = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).time().'.'.$file->getClientOriginalExtension();
            /**insert path image to DB. */
            DB::update('update carousel set carousel_path = ? where id = ?', [$nameImage, $id]);
            /**move file to storage */
                $file->move($path, $nameImage);
              return redirect('/BackendBanner')->with('status', 'Adding Banner Successfully');
        }else{
            return redirect('/BackendBanner')->with('error', 'Image not found 404'); 
        }
    }
    /**store banner. */
    public function StoreBanner(Request $request){
        $path = public_path('storage/banner/');
        try{
            /**validate file type */
            $rules = [
                'carousel' => 'mimes:jpeg,png,jpg,bmp,gif,svg|required',
            ];
            $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    Log::error($validator->errors()->all());  
                    return redirect('/BackendBanner')->withErrors($validator); 
                }  
                /**image store path*/
                if ($request->hasFile('carousel')) {
                    $files = $request->file('carousel');
                    //foreach($files as $file){
                        /**create new the image name*/
                        $nameImage = pathinfo($files->getClientOriginalName(), PATHINFO_FILENAME).time().'.'.$files->getClientOriginalExtension();
                        /**insert path image to DB. */
                        DB::insert('insert into carousel (carousel_path) values (?)', [$nameImage]);
                        /**move file to storage */
                         $files->move($path, $nameImage);
                    //}
                    return redirect('/BackendBanner')->with('status', 'Adding Banner Successfully');
                }else{
                    return redirect('/BackendBanner')->with('error', 'Image not found 404'); 
                }
        }catch(Exception $e){
            /**if error rollBack DB and delete files */
            Log::notice("these was a problem DB is RollBack.");
            DB::rollBack(); 
                if (file_exists($path.$nameImage)) {
                    Log::notice("these was a problem files is delete.");       
                    try{
                        File::delete($path.$nameImage);
                    }catch(Exception $e){
                        Log::error('file image banner has delete probleam.');
                        return redirect('/BackendBanner')->with('error', 'these was a probleam adding banner!');
                    }            
                }       
            return redirect('/BackendBanner')->with('error', 'these was a probleam adding banner.');
        }
    }
}
