<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CentroCostosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ccostos = DB::connection('sqlsrv')->select("
        	SELECT DISTINCT gt.Codigo
			FROM BDFlexline.flexline.GEN_TABCOD gt
			WHERE gt.tipo = 'CON_CCOSTO'
			ORDER BY gt.Codigo ASC
		");

		$now = \Carbon\Carbon::now();

        foreach ($ccostos as $data) 
        {
	    	DB::table('centro_costos')->insert(
	    		array(
	    			'descripcion' => strtoupper($data->Codigo),
	    			'detalle' => "", //strtoupper($data->Descripcion),
	    			'vigencia' => "S", //(strtoupper($data->Vigencia) == 'S') ? 'S' : 'N',
	        		'updated_at' => $now,
	        		'created_at' => $now,        			
	    		)
	    	);
    	}		
    }
}
