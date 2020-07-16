<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUsMaster;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('Contact-Us.contact-us');
    }

    public function ListContactUs()
    {
        $allcontactus = ContactUsMaster::select('*')->get()->toArray();
        $data = json_encode(array('data'=>$allcontactus),JSON_UNESCAPED_UNICODE);
        return $data;
    }
}
