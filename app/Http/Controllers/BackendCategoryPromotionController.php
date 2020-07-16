<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CategoryPromotionMaster;
class BackendCategoryPromotionController extends Controller
{
    public function index()
    {
        return view('BackendCategoryPromotion.Backendcategorypromotion');
    }

    public function ListCategoryPromotion()
    {
        $allpromotion = CategoryPromotionMaster::select('*')->where('stdel',0)->get()->toArray();
        $data = json_encode(array('data'=>$allpromotion),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function AddCategoryPromotion(Request $request)
    {   
        // ทำการ insert ข้อมูล Adding เพื่อรับ id_product ของ col นั้นๆมาใช้ในการตั้งชื่อ folder และ product_code  
        CategoryPromotionMaster::insert(                                               
            [
                'category_promotion_name'=>$request["category_promotion_name"],
                'category_promotion_detail'=>$request["category_promotion_detail"],
                'stdel'=>'0',
            ]);
        return redirect()->back();
    }

    public function EditCategoryPromotion( $id )
    {
        $allpromotion = CategoryPromotionMaster::select('*')->where('id_category_promotion',$id)->get()->toArray();
        $data = json_encode(array('data'=>$allpromotion),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    
    public function SaveEditCategoryPromotion(Request $request)
    {        
        CategoryPromotionMaster::where('id_category_promotion',$request['id_category_promotion'])->update([
                'category_promotion_name'=>$request["category_promotion_name"],
                'category_promotion_detail'=>$request["category_promotion_detail"],
                'stdel'=>'0',
            ]);  
        return redirect()->back();
    }

    public function DeleteCategoryPromotion( $id )
    {
        CategoryPromotionMaster::where('id_category_promotion',$id)->update([
            'stdel'=>1,
        ]);  
        return redirect()->back();
    }

}
