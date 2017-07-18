<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        if(Auth::user()->hasRole('InESSCE'))
              return redirect()->route('CE.Dashboard');
        elseif(Auth::user()->hasRole('JCE'))
              return redirect()->route('JCE.Dashboard');
        elseif(Auth::user()->hasRole('Coordinator'))
              return redirect()->route('Coordinator.Dashboard');
        elseif(Auth::user()->hasRole('Library'))
              return redirect()->route('Library.Dashboard');
        else
              return redirect()->route('Requestor.Dashboard');
    }
}
