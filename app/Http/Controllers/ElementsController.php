<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuMaster;
use App\ContactUsMaster;

class ElementsController extends Controller
{
    public function Listmemu()
    {   
        $allmemu = MenuMaster::select('*')->where('stdel',0)->get()->toArray();
        $data = json_encode(array('data'=>$allmemu),JSON_UNESCAPED_UNICODE);
        //dd($data);
        return $data;
    }

    public function ListContactUs()
    {
        $allcontactus = ContactUsMaster::select('*')->get()->toArray();
        $data = json_encode(array('data'=>$allcontactus),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    
}
