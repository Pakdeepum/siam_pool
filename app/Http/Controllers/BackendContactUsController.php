<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUsMaster;

class BackendContactUsController extends Controller
{
    public function index()
    {
        return view('BackendContact-Us.Backendcontact-us');
    }
    public function ListContactUs()
    {
        $allcontactus = ContactUsMaster::select('*')->get()->toArray();
        $data = json_encode(array('data'=>$allcontactus),JSON_UNESCAPED_UNICODE);
        return $data;
    }
    public function SaveEditContactUs(Request $request)
    {
        //dd($request);
        ContactUsMaster::where('id_contact_us',1)->update( 
            [
                'contact_us_text_header'=>$request['contact_us_text_header'],
                'contact_us_email'=>$request['contact_us_email'],
                'contact_us_phone'=>$request['contact_us_phone'],
                'contact_us_address'=>$request['contact_us_address'],

                'contact_us_facebook_url'=>$request['contact_us_facebook_url'],
                'contact_us_twitter_url'=>$request['contact_us_twitter_url'],
                'contact_us_instagram_url'=>$request['contact_us_instagram_url'],
                'contact_us_phone1'=>$request['contact_us_phone1'],

            ]);  

            return redirect()->back();
    }
}
