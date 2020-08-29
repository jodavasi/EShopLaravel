<?php

namespace App\Http\Controllers;

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
    public function index(Request $request)
    {
        
           
        if( $request->user()->email == 'lineadan@gmail.com'){
            return redirect()->route('estadisticasAdmin.index');
        }else{
            return redirect()->route('estadisticasUser.index');
        }
        // $request->user()->authorizeRoles(['admin']);
        
       
    }
}
