<?php

use Illuminate\Database\Seeder;

class BancosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bancos = DB::connection('sqlsrv')->select("
			SELECT DISTINCT gt.Codigo, gt.Nemotecnico, gt.Descripcion
			FROM BDFlexline.flexline.GEN_TABCOD gt
			WHERE gt.tipo = 'GEN_BANCOS'
			ORDER BY gt.Codigo ASC
		");

		$now = \Carbon\Carbon::now();

        foreach ($bancos as $data) 
        {
	    	DB::table('bancos')->insert(
	    		array(
	    			'descripcion' => strtoupper($data->Nemotecnico),
					'detalle' => strtoupper($data->Descripcion),
					'codigo' => strtoupper($data->Codigo),
	    			'vigencia' => 'S',
	        		'updated_at' => $now,
	        		'created_at' => $now,        			
	    		)
	    	);
    	}

    }
}
