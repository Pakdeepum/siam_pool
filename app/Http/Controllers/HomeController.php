<?php
namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->roles==0){
            return view('home');
        }else{
            auth()->flush();
            
            return  Redirect::to('/');
        }
    }
    
}
