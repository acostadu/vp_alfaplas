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
        //$empresa = ($request->session()->has('empresa')) ? $request->session()->get('empresa') : '001';

        $ventas = DB::table('vendedor_ventas')
                        ->select('Vendedor', DB::raw('SUM(Neto) AS Total'))
                        ->where('empresa', '001')
                        ->whereIn('tipodocto', 
                            [
                                'FACTURA VENTA (FE)', 
                                'N. CRDTO VENTA (FE)', 
                                'BOLETA VENTA (FE)', 
                                'FACTURA EXPORTACION'
                            ]
                        )
                        ->whereBetween('fecha', ['2018-04-01', '2018-05-31'])
                        //->where('fechames', '4')
                        ->groupBy('vendedor')
                        ->orderBy('vendedor', 'ASC')
                        ->get();      

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
    
    public function show($id, $mes = null, $fe_inicio = null, $fe_fin = null, Request $request)
    {
        if ($mes)
        {
            $ventas = DB::table('vendedor_ventas')
                            ->select('Vendedor', DB::raw('SUM(Neto) AS Total'))
                            ->where('empresa', $id)
                            ->whereIn('tipodocto', 
                                [
                                    'FACTURA VENTA (FE)', 
                                    'N. CRDTO VENTA (FE)', 
                                    'BOLETA VENTA (FE)', 
                                    'FACTURA EXPORTACION'
                                ]
                            )
                            ->where('fechames', $mes)
                            ->groupBy('vendedor')
                            ->orderBy('vendedor', 'ASC')
                            ->get();      
        } else {
            $ventas = DB::table('vendedor_ventas')
                            ->select('Vendedor', DB::raw('SUM(Neto) AS Total'))
                            ->where('empresa', $id)
                            ->whereIn('tipodocto', 
                                [
                                    'FACTURA VENTA (FE)', 
                                    'N. CRDTO VENTA (FE)', 
                                    'BOLETA VENTA (FE)', 
                                    'FACTURA EXPORTACION'
                                ]
                            )
                            ->whereBetween('fecha', [$fe_inicio, $fe_fin])
                            ->groupBy('vendedor')
                            ->orderBy('vendedor', 'ASC')
                            ->get();
        }

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
