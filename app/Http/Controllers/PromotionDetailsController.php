<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PromotionMaster;

class PromotionDetailsController extends Controller
{
    // public function index()
    // {
    //     return view('Promotion.promotion-details');
    // }

    public function ListPromotionDetail(Request $request)
    {
        $allpromotiondetail = PromotionMaster::select('*')->where('stdel',0)->where('id_promotion',$request['id_promotion'])->get()->toArray();
       // dd($allpromotiondetail);
        return view('Promotion.promotion-details')->with('data',$allpromotiondetail);
    }

}
