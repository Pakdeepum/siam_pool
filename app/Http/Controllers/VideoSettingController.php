<?php

namespace App\Http\Controllers;

use App\VideoSetting;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Log;
class VideoSettingController extends Controller
{
    public function index()
    {
      $allVideoSetting = DB::table('video_setting')->where('stdel',0)->paginate(5);
        //return response()->JSON(['allVideoSetting' => $allVideoSetting]);
      return view('BackendVideoSetting.BackendVideoSetting')
      ->with( ['allVideoSetting' => $allVideoSetting] );

    }
    public function ListVideoAll(){
      $allVideoSetting = DB::table('video_setting')->where('stdel',0)->paginate(15);
        return response()->JSON(['data' => $allVideoSetting]);
    }
    public function ListVideoSelect()
    {
        $VideoSetting = VideoSetting::select('*')->where('stdel',0)->where('status',1)->get()->toArray();        
        return response()->JSON($VideoSetting);
    }
    public function DeleteVideo($id)
    {
        VideoSetting::where('id_video',$id)->update([
            'stdel'=>1,
            'deleted_at'=>Carbon::now('Asia/Bangkok')
        ]);
        return redirect()->back()->with('message', 'Delete Video Success');
    }
    public function AddVideo(Request $request)
    {
        //return response()->JSON($request);
        VideoSetting::insert([
          'video_url_embed'=>$request['video_url_embed'],
          'video_url'=>$request['video_url'],
          'status'=>$request['IsPubblish'],
          'created_at'=>Carbon::now('Asia/Bangkok')
        ]);
        return redirect()->back()->with('message', 'Add Video Success');
    }
    public function EditVideo($id)
    {
        $EditVideo = VideoSetting::all()
            ->where('id_video',$id)
            ->where('stdel',0)->first();
        return response()->JSON(['editVideo' => $EditVideo]);
    }
    /**
     * หน้าแก้ไขหมวดหมู่สินค้า
     */
    public function SaveEditVideo(Request $request)
    {
        if($request['id_video']){
          //return response()->JSON($request);
          VideoSetting::where('id_video',$request['id_video'])
          ->update([
            'video_url_embed'=>$request['video_url_embed'],
            'video_url'=>$request['video_url'],
            'status'=>$request['IsPubblish'],
            'updated_at'=>Carbon::now('Asia/Bangkok')
          ]);
          return redirect()->back()->with('message', 'Edit Video Success');

        }
          return redirect()->back()->with('message', 'Edit Video Failed');
    }
    public function VideoStatusUpdate(Request $request){
        //Log::Debug('request:',[$request]);
        VideoSetting::where('id_video',$request['data']['id_video'])
        ->update(['status'=>$request['data']['status']]);
        return response()->JSON(['success' => true]);
    }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }
    //
    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }
    //
    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }
    //
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\video_setting  $video_setting
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(video_setting $video_setting)
    // {
    //     //
    // }
    //
    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\video_setting  $video_setting
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(video_setting $video_setting)
    // {
    //     //
    // }
    //
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\video_setting  $video_setting
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, video_setting $video_setting)
    // {
    //     //
    // }
    //
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\video_setting  $video_setting
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(video_setting $video_setting)
    // {
    //     //
    // }
}
