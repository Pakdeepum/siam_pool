<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PromotionMaster;
use DB;
use Auth;
use Illuminate\Support\Facades\Storage;

class BackendPromotionController extends Controller
{
    public function index()
    {
        return view('BackendPromotion.Backendpromotion');
    }
    public function ListPromotion()
    {
        $allproduct = DB::table('promotion_master')
        ->where('promotion_master.stdel', '=', '0')
        ->leftJoin('category_promotion_master', 'promotion_master.id_category_promotion', '=', 'category_promotion_master.id_category_promotion')
        ->get()
        ->toArray();
        $data = json_encode(array('data'=>$allproduct),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    
    public function EditPromotion(int $id)
    {
        $allproduct = DB::table('promotion_master')
        ->where('promotion_master.stdel', '=', '0')
        ->where('promotion_master.id_promotion', '=', $id)
        ->leftJoin('category_promotion_master', 'promotion_master.id_category_promotion', '=', 'category_promotion_master.id_category_promotion')
        ->get()
        ->toArray();
        $data = json_encode(array('data'=>$allproduct),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    
    public function AddPromotion(Request $request)
    {
        PromotionMaster::insert(  // ทำการ insert ข้อมูล Adding เพื่อรับ id_product ของ col นั้นๆมาใช้ในการตั้งชื่อ folder และ product_code                                               
            [
                'pic_url'=>"Adding",
            ]);
            //อัพแต่ไฟส์ jpg png 
            $HaveImages = 0 ;
            $new_id = (PromotionMaster::all()->toArray())[count(PromotionMaster::all()->toArray()) - 1]['id_promotion']; //Get ID with Count Bank to name pic
            $showpath = null ;
            //  ถ้าไม่ iput รูปก็ไม่ทำ
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $HaveImages = 1 ;
                $type = $file->getClientOriginalExtension();

                if($type == "jpg" || $type == "jpeg" || $type == "png"){ 
                    Storage::makeDirectory('storage/promotion/'.$new_id); 
                    if($type == "jpeg" || $type == "jpg"){  
                        $file->move('storage/promotion/'.$new_id, $new_id.'.jpg');
                        $showpath = $new_id.'.jpg';
                    }
                    if($type == "png"){
                        $file->move('storage/promotion/'.$new_id, $new_id.'.png');
                        $showpath = $new_id.'.png';
                    } 
                }
                PromotionMaster::where('id_promotion',$new_id)->update([
                    'id_promotion' => $new_id ,
                    'promotion_name' => $request['promotion_name'] ,
                    'promotion_detail' => $request['promotion_detail'] ,
                    'stdel' => 0 ,
                    'id_user' => Auth::user()->id ,
                    'date_upload' => $request['date_upload'] ,
                    'date_end_show' => $request['date_end_show'] ,
                    'pic_url' => $showpath ,
                    'id_category_promotion' => $request['id_category_promotion'] ,
                ]);  
            }
        return redirect()->back();
    }

    public function SaveEditPromotion(Request $request)
    {
        //อัพแต่ไฟส์ jpg png 
        $HaveImages = 0 ;
        $new_id = $request['id_promotion']; //Get ID with Count Bank to name pic
        $showpath = null ;
        //  ถ้าไม่ iput รูปก็ไม่ทำ
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $HaveImages = 1 ;
            //ลบรูปเก่า
            Storage::delete('storage/promotion/'.$request['pic_url']); 
            $type = $file->getClientOriginalExtension();

            if($type == "jpg" || $type == "jpeg" || $type == "png"){ 
                Storage::makeDirectory('storage/promotion/'.$new_id); 
                if($type == "jpeg" || $type == "jpg"){  
                    $file->move('storage/promotion/'.$new_id, $new_id.'.jpg');
                    $showpath = $new_id.'.jpg';
                }
                if($type == "png"){
                    $file->move('storage/promotion/'.$new_id, $new_id.'.png');
                    $showpath = $new_id.'.png';
                } 
            }
            PromotionMaster::where('id_promotion',$new_id)->update([
                'pic_url' => $showpath ,   
            ]);  
        }
        PromotionMaster::where('id_promotion',$new_id)->update([
            'id_promotion' => $new_id ,
            'promotion_name' => $request['promotion_name'] ,
            'promotion_detail' => $request['promotion_detail'] ,
            'stdel' => 0 ,
            'id_user' => Auth::user()->id ,
            'date_upload' => $request['date_upload'] ,
            'date_end_show' => $request['date_end_show'] ,
            'id_category_promotion' => $request['id_category_promotion'] ,
        ]);  
        return redirect()->back();
    }

    public function ListCategoryPromotion()
    {
        $allproduct = DB::table('category_promotion_master')
        ->where('category_promotion_master.stdel', '=', '0')
        ->get()
        ->toArray();
        $data = json_encode(array('data'=>$allproduct),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function DeletePromotion( $id )
    {
        PromotionMaster::where('id_promotion',$id)->update([
            'stdel'=>1,
        ]);  
        return redirect()->back();
    }

    public function SelectPromotionByCategoryPromotion( $id )
    {
        $allproduct = DB::table('promotion_master')
        ->where('promotion_master.stdel', '=', '0')
        ->where('promotion_master.id_category_promotion', '=', $id)
        ->leftJoin('category_promotion_master', 'promotion_master.id_category_promotion', '=', 'category_promotion_master.id_category_promotion')
        ->get()
        ->toArray();
        $data = json_encode(array('data'=>$allproduct),JSON_UNESCAPED_UNICODE);
        return $data;
    } 
}
