<?php

namespace App\Http\Controllers;

use App\User;
use Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Auth;
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
        return view('home');
    }
    
    public function status(Request $request){
        Request::ajax();
        $status = Input::get('ajax_status');
        if(User::where('id', Auth::user()->id)->update(['status' => $status])){
            echo "ok";
        };
        
    }
    
    
}
