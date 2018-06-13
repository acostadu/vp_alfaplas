<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LugarPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lpago = DB::connection('sqlsrv')->select("
			SELECT DISTINCT gt.Codigo
			FROM BDFlexline.flexline.GEN_TABCOD gt
			WHERE gt.tipo = 'PER_LPAGO'
		");

		$now = \Carbon\Carbon::now();

        foreach ($lpago as $data) 
        {
	    	DB::table('lugar_pagos')->insert(
	    		array(
	    			'descripcion' => strtoupper($data->Codigo),
	        		'updated_at' => $now,
	        		'created_at' => $now,        			
	    		)
	    	);
    	}
    }
}
