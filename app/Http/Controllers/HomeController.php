<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        $connection = DB::connection('sqlsrv');
        $empresas = $connection->select('SELECT * FROM BDFlexline.security.SEG_EMPRESA');
       
        return view('adminlte::home', compact('empresas'));
        //return view('adminlte::layouts.app', compact('empresas'));
    }
}
