<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PromotionMaster;

class PromotionController extends Controller
{
    public function index()
    {
        return view('Promotion.promotion');
    }

    public function ListPromotion()
    {
        $allpromotion = PromotionMaster::select('*')->where('stdel',0)->get()->toArray();
        $data = json_encode(array('data'=>$allpromotion),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function ListPromotionByCategoryPromotion(int $id_category_promotion)
    {   
        $allcategorypromotion = PromotionMaster::select('*')->where('stdel',0)->where('id_category_promotion',$id_category_promotion)->get()->toArray();
        $data = json_encode(array('data'=>$allcategorypromotion),JSON_UNESCAPED_UNICODE);
        return $data;
    }

}
