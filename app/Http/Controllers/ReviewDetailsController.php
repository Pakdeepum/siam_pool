<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewMaster;
use App\ProductMaster;

class ReviewDetailsController extends Controller
{
    public function ListReviewDetail(Request $request)
    {

        $allreviewdetail = ReviewMaster::select('*')->where('stdel',0)->where('id_review',$request['id_review'])->get()->toArray();
        //dd($allreviewdetail[0]['id_product']);
        $allproducttype = ProductMaster::select('*')->where('stdel',0)->where('id_product',$allreviewdetail[0]['id_product'])->get()->toArray();
        return view('Reviews.review-details')->with('data',$allreviewdetail)->with('data1',$allproducttype);
    }

}
