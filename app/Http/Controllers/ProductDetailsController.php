<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductMaster;

class ProductDetailsController extends Controller
{
    public function ListProductDetail(Request $request)
    {
        $allproductdetail = ProductMaster::with('special')->where('stdel',0)
        ->where('id_product',$request['id_product'])->get()->toArray();
        //dd($allproductdetail);
        //return response()->json($allproductdetail);
        return view('Product.product-details')->with(['data'=>$allproductdetail , 'category'=>$request['id_category']])->render();
    }
}
