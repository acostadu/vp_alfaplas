<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class NotaCrdtoVentaFEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $connection = DB::connection('sqlsrv');
        $nota_crdto_venta_fe = $connection->select("SELECT TOP 10 a.empresa, a.tipodocto, a.correlativo, a.idctacte, a.fecha, a.moneda, a.vigencia, a.bodega, a.vendedor, a.totalingreso
FROM BDFlexline.flexline.documento a
WHERE empresa = '888' AND a.tipodocto = 'N. CRDTO VENTA (FE)' AND a.fecha >= '2017-01-12'
ORDER BY a.fecha ASC");

        //return var_dump($empresas);        
        return view('adminlte::nota_crdto_venta_fe', compact('nota_crdto_venta_fe'));
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
    public function show($id, $fe_inicio = null, $fe_fin = null, Request $request)
    {
        $nc_venta_fe = DB::connection('sqlsrv')->table('BDFlexline.flexline.documento')
                        ->select(
                            'empresa', 
                            'tipodocto', 
                            'correlativo', 
                            'idctacte',
                            'fecha', 
                            'moneda', 
                            'vigencia',
                            'bodega',
                            'vendedor',
                            'totalingreso'
                        )
                        ->where('empresa', $id)
                        ->where('tipodocto', 'N. CRDTO VENTA (FE)')
                        ->whereBetween('fecha', [$fe_inicio, $fe_fin])
                        //->where('fechames', '4')
                        //->groupBy('vendedor')
                        ->orderBy('correlativo', 'ASC')
                        ->paginate(15);

        $fe_ini = (isset($fe_inicio)) ? $fe_inicio : date('Y-d-m');
        $fe_fin = (isset($fe_fin)) ? $fe_fin : date('Y-d-m');                        

        $view = View::make('adminlte::nota_crdto_venta_fe')
                ->with('fe_inicio', $fe_ini)
                ->with('fe_fin', $fe_fin)        
                ->with('nc_venta_fe', $nc_venta_fe);       

        if($request->ajax()) 
        {
            $sections = $view->renderSections();
            //return Response::json(array('success' => true, 'data' => $sections['main-content']));
            return Response::json(
                array(
                    'success' => true,
                    'header' => $sections['contentheader_title'],                    
                    'data' => $sections['main-content']
                )
            );            
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
