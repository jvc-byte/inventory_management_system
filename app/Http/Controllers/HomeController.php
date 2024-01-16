<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        // dd(Auth::user()->user_type);

        if(Auth::user()->user_type == 1){
            return view('home');
        }elseif(Auth::user()->user_type == 2){
            return redirect()->route('warehouse.home');
        }elseif(Auth::user()->user_type == 3){
            return redirect()->route('manager.home');
        }
        
    }
}
