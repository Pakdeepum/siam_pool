<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CategoryPromotionMaster;


class CategoryPromotionController extends Controller
{

    public function ListCategoryPromotion()
    {
        $allcategorypromotion = CategoryPromotionMaster::select('*')->where('stdel',0)->get()->toArray();
        $data = json_encode(array('data'=>$allcategorypromotion),JSON_UNESCAPED_UNICODE);
        return $data;
    }
}
