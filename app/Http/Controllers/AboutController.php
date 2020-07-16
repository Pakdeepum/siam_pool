<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutMaster;

class AboutController extends Controller
{
    public function index()
    {
        return view('About.about');
    }

    public function ListAbout()
    {
        $allview = AboutMaster::select('*')->get()->toArray();
        $data = json_encode(array('data'=>$allview),JSON_UNESCAPED_UNICODE);
        return $data;
    }
}
