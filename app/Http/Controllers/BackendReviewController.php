<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewMaster;
use App\ProductMaster;
use Auth;
use Illuminate\Support\Facades\Storage;

class BackendReviewController extends Controller
{
    public function index()
    {
        return view('BackendReview.Backendreview');
    }

    public function ListReviews()
    {
        $allview = ReviewMaster::select('*')->where('stdel',0)->orderBy('id_review', 'DESC')->get()->toArray();
        $data = json_encode(array('data'=>$allview),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function DeleteReview(Request $request)
    {
        ReviewMaster::where('id_review',$request['id_review'])->update([
            'stdel'=>1,
        ]);  
        return redirect()->back();
    }

    public function ListAboutProduct()
    {
        $allproducttype = ProductMaster::select('*')->where('stdel',0)->get()->toArray();
        $data = json_encode(array('data'=>$allproducttype),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    
    public function EditReview($id)
    {
        $allview = ReviewMaster::select('*')->where('id_review',$id)->get()->toArray();
        $data = json_encode(array('data'=>$allview),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function SaveReview(Request $request)
    {      
        // ทำการ insert ข้อมูล Adding เพื่อรับ id_product ของ col นั้นๆมาใช้ในการตั้งชื่อ folder และ product_code 
        ReviewMaster::insert(                                                
            [
                'pic_url'=>"Adding",
            ]);
            //อัพแต่ไฟส์ jpg png 
            $HaveImages = 0 ;
             //Get ID with Count Bank to name pic
            $new_id = (ReviewMaster::all()->toArray())[count(ReviewMaster::all()->toArray()) - 1]['id_review'];
            $showpath = null ;
            //  ถ้าไม่ iput รูปก็ไม่ทำ
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $HaveImages = 1 ;
                $type = $file->getClientOriginalExtension();

                if($type == "jpg" || $type == "jpeg" || $type == "png"){ 
                    Storage::makeDirectory('storage/review/'.$new_id); 
                    if($type == "jpeg" || $type == "jpg"){  
                        $file->move('storage/review/'.$new_id, $new_id.'.jpg');
                        $showpath = $new_id.'.jpg';
                    }
                    if($type == "png"){
                        $file->move('storage/review/'.$new_id, $new_id.'.png');
                        $showpath = $new_id.'.png';
                    } 
                }
                ReviewMaster::where('id_review',$new_id)->update([
                    'pic_url'=>$showpath,  
                ]); 
            }
            ReviewMaster::where('id_review',$new_id)->update( 
                [
                    'stdel'=> 0 ,
                    'id_product' =>$request['id_product'] ,
                    'name_review' =>$request['name_review'] ,
                    'review_detail' =>$request['review_detail'] ,
                    'id_user' => Auth::user()->id ,
                ]
            );  
            return redirect()->back();
    }
    public function SaveEditReview(Request $request)
    {      
            //อัพแต่ไฟส์ jpg png 
            $HaveImages = 0 ;
            //Get ID with Count Bank to name pic
            $new_id = $request['id_review']; 
            $showpath = null ;
            // ถ้าไม่ iput รูปก็ไม่ทำ
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $HaveImages = 1 ;
                $type = $file->getClientOriginalExtension();
                //ลบรูปเก่า
                Storage::delete('public/review/'.$request['pic_url']); 
                if($type == "jpg" || $type == "jpeg" || $type == "png"){ 
                    Storage::makeDirectory('storage/review/'.$new_id); 
                    if($type == "jpeg" || $type == "jpg"){  
                        $file->move('storage/review/'.$new_id, $new_id.'.jpg');
                        $showpath = $new_id.'.jpg';
                    }
                    if($type == "png"){
                        $file->move('storage/review/'.$new_id, $new_id.'.png');
                        $showpath = $new_id.'.png';
                    } 
                }
                ReviewMaster::where('id_review',$new_id)->update([
                    'pic_url'=>$showpath,  
                ]); 
            }
            ReviewMaster::where('id_review',$new_id)->update([
                'stdel'=> 0 ,
                'id_product' =>$request['id_product'] ,
                'name_review' =>$request['name_review'] ,
                'review_detail' =>$request['review_detail'] ,
                'id_user' => Auth::user()->id ,
            ]);  
        return redirect()->back();
    }
}