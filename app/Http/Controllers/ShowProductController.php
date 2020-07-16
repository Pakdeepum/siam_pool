<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ShowProductController extends Controller
{
    public function index()
    {
        $carousal = DB::select('select * from carousel Order by created_at DESC');
        return view('ShowProduct.show-product')->with(['carousel'=>$carousal]);
    }
}
