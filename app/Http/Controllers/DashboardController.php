<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show($id, $ciclo, Request $request)
    {

        $meses = DB::table('mes')->get();

        $ventas = DB::table('vendedor_ventas')
                        ->select('fechames', DB::raw('SUM(Neto) AS Total'))
                        ->where('empresa', $id)
                        ->whereIn('tipodocto', 
                            [
                                'FACTURA VENTA (FE)', 
                                'N. CRDTO VENTA (FE)', 
                                'BOLETA VENTA (FE)', 
                                'FACTURA EXPORTACION'
                            ]
                        )
                        ->where('fechaano', $ciclo)
                        ->groupBy('fechames')
                        ->orderBy('fechames', 'ASC')
                        ->get();        

        //dd($meses);
        //$total = 0;
        $data_ventas = [];

        foreach ($meses as $mes) {
            $data_ventas [] = array( 
                'id' => $mes->id, 
                'descripcion' =>$mes->descripcion
            );
        }

        //dd($data_ventas);

        $view = View::make('adminlte::dashboard')
            ->with('meses', $meses)
            ->with('ventas', $ventas);

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
