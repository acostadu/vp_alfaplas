<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kattatzu\Sbif\Sbif;
use Kattatzu\Sbif\Institution;
//use Kattatzu\Sbif\Facades\SbifFacade;

class SbifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$date = Carbon::today();
        $date = \Carbon\Carbon::now();
        $sbif = new Sbif();
        $sbif->apiKey('7c1e482c477b8af7281ecd334296eeeb427a2642');

        echo $sbif->getIndicator(Sbif::IND_EURO, $date)."<br/>";
        echo $sbif->getIndicator(Sbif::IND_DOLLAR, $date)."<br/>";
        echo $sbif->getIndicator(Sbif::IND_UTM, $date)."<br/>";
        echo $sbif->getIndicator(Sbif::IND_UF, $date)."<br/>";

        //echo $sbif->getIndicator(Sbif::IND_IPC, $date)."<br/>";
        //var_dump($sbif);
        //print_r($sbif->getDollar());
        //echo $sbif->getDollar()." <- Dolar<br/>";
        //echo $sbif->getEuro()." <- Euro<br/>";        
        //echo $sbif->getUTM()." <- UTM<br/>";
        //echo $sbif->getUF()." <- UF<br/>";
        //echo $sbif->getIPC()." <- UF<br/>";

        //664.0
        //echo $sbif->getIndicator(Sbif::IND_DOLLAR);        
        //var_dump($sbif->get("/resultados/2018/12/instituciones"));
        //$info = $sbif->getInstitutionData('016')->toArray();
        //dd($info);
        //dd((new Institution)->getInstitutions());
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
        //
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
