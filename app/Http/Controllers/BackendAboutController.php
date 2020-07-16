<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutMaster;
use Illuminate\Support\Facades\Storage;

class BackendAboutController extends Controller
{
    public function index()
    {
        return view('BackendAbout.Backendabout');
    }
    public function ListAbout()
    {
        $allview = AboutMaster::select('*')->get()->toArray();
        $data = json_encode(array('data'=>$allview),JSON_UNESCAPED_UNICODE);
        return $data;
    }

    private function uploadFile1($file,$type,$new_id){
        if($type == "jpg" || $type == "jpeg" || $type == "png"){ 
            Storage::makeDirectory('storage/about/'.$new_id); 
            if($type == "jpeg" || $type == "jpg"){  
                $file->move('storage/about/'.$new_id, $new_id.'.jpg');
                $showpath1 = $new_id.'.jpg';
            }
            if($type == "png"){
                $file->move('storage/about/'.$new_id, $new_id.'.png');
                $showpath1 = $new_id.'.png';
            } 
        }
        return $showpath1;
    }

    private function uploadFile2($file,$type,$new_id){
        if($type == "jpg" || $type == "jpeg" || $type == "png"){ 
            Storage::makeDirectory('storage/about/'.$new_id); 
            if($type == "jpeg" || $type == "jpg"){  
                $file->move('storage/about/'.$new_id, $new_id.'.jpg');
                $showpath2 = $new_id.'.jpg';
            }
            if($type == "png"){
                $file->move('storage/about/'.$new_id, $new_id.'.png');
                $showpath2 = $new_id.'.png';
            } 
        }
        return $showpath2;
    }

    public function SaveEditAbout(Request $request)
    {
        $about = AboutMaster::select('*')->get();
        if(count($about) == 0){
            $this->AddAbout($request);
        }else{
            $this->updateAbout($request);
        }
        return redirect()->back();
    }

    private function AddAbout($request){
        //อัพแต่ไฟส์ jpg png 
        // set name id pic 
        $new_id = 1 ; 
        $showpath1 = null ;
        //  ถ้าไม่ iput รูปก็ไม่ทำ
        if ($request->hasFile('about_us_content_1_file_pic')) {
            $file = $request->file('about_us_content_1_file_pic');
            $HaveImages = 1 ;
            $type = $file->getClientOriginalExtension();

            $showpath1= $this->uploadFile1($file,$type,$new_id);
        }
        
        // set name id pic 
        $new_id = 2 ; 
        $showpath2 = null ;
        //  ถ้าไม่ iput รูปก็ไม่ทำ
        if ($request->hasFile('about_us_content_2_file_pic')) {
            $file = $request->file('about_us_content_2_file_pic');
            $HaveImages = 1 ;
            $type = $file->getClientOriginalExtension();
               
            $showpath2 = $this->uploadFile2($file,$type,$new_id);

        }
 
        AboutMaster::create([
                'about_us_text_header'=>$request['about_us_text_header'],
                'about_us_content_1_header'=>$request['about_us_content_1_header'],
                'about_us_content_1_text_1'=>$request['about_us_content_1_text_1'],
                'about_us_content_1_text_2'=>$request['about_us_content_1_text_2'],
                'about_us_content_1_text_3'=>$request['about_us_content_1_text_3'],
                'about_us_content_1_text_4'=>$request['about_us_content_1_text_4'],
                'about_us_content_1_text_5'=>$request['about_us_content_1_text_5'],
                'about_us_content_1_pic_url'=>$showpath1,

                'about_us_content_2_header'=>$request['about_us_content_2_header'],
                'about_us_content_2_text_1'=>$request['about_us_content_2_text_1'],
                'about_us_content_2_text_2'=>$request['about_us_content_2_text_2'],
                'about_us_content_2_text_3'=>$request['about_us_content_2_text_3'],
                'about_us_content_2_text_4'=>$request['about_us_content_2_text_4'],
                'about_us_content_2_text_5'=>$request['about_us_content_2_text_5'],
                'about_us_content_2_pic_url'=>$showpath2,
            ]);
    }

    private function updateAbout($request){
        //อัพแต่ไฟส์ jpg png 
        // set name id pic 
        $new_id = 1 ; 
        $showpath1 = null ;
        //  ถ้าไม่ iput รูปก็ไม่ทำ
        if ($request->hasFile('about_us_content_1_file_pic')) {
            $file = $request->file('about_us_content_1_file_pic');
            $HaveImages = 1 ;
            $type = $file->getClientOriginalExtension();

            Storage::delete('storage/about/'.$new_id.'.jpg'); //ลบรูปเก่า
            Storage::delete('storage/about/'.$new_id.'.png'); //ลบรูปเก่า

            $showpath1 = $this->uploadFile1($file,$type,$new_id);

            if($showpath1 != null)
            {
                AboutMaster::where('id_about_us',1)->update([
                    'about_us_content_1_pic_url'=>$showpath1,
                ]);  
            }
        }
        
        // set name id pic 
        $new_id = 2 ; 
        $showpath2 = null ;
        //  ถ้าไม่ iput รูปก็ไม่ทำ
        if ($request->hasFile('about_us_content_2_file_pic')) {
            $file = $request->file('about_us_content_2_file_pic');
            $HaveImages = 1 ;
            $type = $file->getClientOriginalExtension();

            Storage::delete('storage/about/'.$new_id.'.jpg'); //ลบรูปเก่า
            Storage::delete('storage/about/'.$new_id.'.png'); //ลบรูปเก่า

            $showpath2 = $this->uploadFile2($file,$type,$new_id);
            
            if($showpath2 != null)
            {
                AboutMaster::where('id_about_us',1)->update([
                    'about_us_content_2_pic_url'=>$showpath2,
                ]);  
            }
        }
 
        AboutMaster::where('id_about_us',0)->update([
                'about_us_text_header'=>$request->input('about_us_text_header'),
                'about_us_content_1_header'=>$request['about_us_content_1_header'],
                'about_us_content_1_text_1'=>$request['about_us_content_1_text_1'],
                'about_us_content_1_text_2'=>$request['about_us_content_1_text_2'],
                'about_us_content_1_text_3'=>$request['about_us_content_1_text_3'],
                'about_us_content_1_text_4'=>$request['about_us_content_1_text_4'],
                'about_us_content_1_text_5'=>$request['about_us_content_1_text_5'],

                'about_us_content_2_header'=>$request['about_us_content_2_header'],
                'about_us_content_2_text_1'=>$request['about_us_content_2_text_1'],
                'about_us_content_2_text_2'=>$request['about_us_content_2_text_2'],
                'about_us_content_2_text_3'=>$request['about_us_content_2_text_3'],
                'about_us_content_2_text_4'=>$request['about_us_content_2_text_4'],
                'about_us_content_2_text_5'=>$request['about_us_content_2_text_5'],
            ]);  
    }
}