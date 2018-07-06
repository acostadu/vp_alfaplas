<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

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
        $connection = DB::connection('sqlsrv');
        $empresas = $connection->select('SELECT * FROM BDFlexline.security.SEG_EMPRESA');
       
        return view('adminlte::home', compact('empresas'));

        /*$empresas = DB::connection('mysql')->table('empresas')->get();        
       
        $view = View::make('adminlte::empresas')->with('empresas', $empresas);

        if($request->ajax()) 
        {
            $sections = $view->renderSections();
            return Response::json(array('success' => true, 'data' => $sections['window-modal'], 'modal' => '#empresaModal'));
        }
        else return $view;*/        
    }
}
