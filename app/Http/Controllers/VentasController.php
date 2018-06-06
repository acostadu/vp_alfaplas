<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $connection = DB::connection('sqlsrv');
        $ventas = $connection->select("SELECT a.Vendedor, SUM(a.Neto) AS Total FROM BDFlexline.dbo.tmp_g1 a WHERE a.empresa = '001' AND a.tipodocto IN ('FACTURA VENTA (FE)', 'N. CRDTO VENTA (FE)', 'BOLETA VENTA (FE)', 'FACTURA EXPORTACION') AND a.fecha BETWEEN '2018-01-05' AND '2018-31-05'
GROUP BY a.Vendedor
ORDER BY a.Vendedor ASC");

        $total = 0;

        $view = View::make('adminlte::listarVentas')
            ->with('ventas', $ventas)
            ->with('total', $total);

        if($request->ajax()) 
        {
            $sections = $view->renderSections();
            return Response::json(array('success' => true, 'data' => $sections['main-content']));
        }
        else return $view;

        //return view('adminlte::listarVentas', compact('ventas'));
        
        //$image = Image::all();
       // return Response::json($view->renderSections()['main-content']);
        
        /*if($request->ajax()){
            //Aqui se hace el RenderSections, esto si y solo si la solicitud es de tipo ajax
            //$sections = $view->adminltelistarVentas();
            //dd($sections);

            //return Response::json($sections['main-content']); // se envie el sections con un formato json

        } else return $view; */      
        //return view('adminlte::listarVentas')->with('ventas',$ventas)->renderSections()['main-content'];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$connection = DB::connection('sqlsrv');
        $ventas = $connection->select("SELECT a.Vendedor, SUM(a.Neto) AS Total FROM BDFlexline.dbo.tmp_g1 a WHERE a.empresa = '888' AND a.tipodocto IN ('FACTURA VENTA (FE)', 'N. CRDTO VENTA (FE)', 'BOLETA VENTA (FE)') AND a.fecha BETWEEN '2018-01-01' AND '2018-31-12'
GROUP BY a.Vendedor
ORDER BY a.Vendedor ASC");*/

        //return view('adminlte::listarVentas', compact('ventas'));
        //$image = Image::all();
        /*$view = View::make('adminlte::listarVentas')->with('ventas', $ventas);
        
        if($request->ajax()){
            //Aqui se hace el RenderSections, esto si y solo si la solicitud es de tipo ajax
            $sections = $view->listarVentas();
            dd($sections);

            //return Response::json($sections['main-content']); // se envie el sections con un formato json

        } else return $view;*/
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
