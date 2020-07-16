<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryProductMaster;

class CategoryProductController extends Controller
{
    public function ListCategoryProduct()
    {
        $allcategoryproduct = CategoryProductMaster::select('*')->where('stdel',0)->get()->toArray();
        $data = json_encode(array('data'=>$allcategoryproduct),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function GetCategoryById($id)
    {
        $cateData = CategoryProductMaster::select('*')->where('stdel',0)->where('id_category_product',$id)->get()->first();
        //$data = json_encode(array('data'=>$cateData),JSON_UNESCAPED_UNICODE);
        return response()->json($cateData);
        //return $data;
    }
}
