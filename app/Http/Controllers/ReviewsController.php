<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewMaster;
use App\ProductMaster;

class ReviewsController extends Controller
{
    public function index()
    {
        return view('Reviews.reviews');
    }
    
    public function ListReviews()
    {
        $allview = ReviewMaster::select('*')->where('stdel',0)->orderBy('id_review', 'DESC')->get()->toArray();
        $data = json_encode(array('data'=>$allview),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function ListAboutProduct()
    {
        $allproducttype = ProductMaster::select('*')->where('stdel',0)->get()->toArray();
        $data = json_encode(array('data'=>$allproducttype),JSON_UNESCAPED_UNICODE);
        return $data;
    }
}
