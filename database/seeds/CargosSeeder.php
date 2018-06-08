<?php

use Illuminate\Database\Seeder;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargo = DB::connection('sqlsrv')->select("
			SELECT DISTINCT Codigo
			FROM BDFlexline.flexline.GEN_TABCOD gt
			WHERE gt.Tipo = 'PER_CARGO'
			ORDER BY gt.Codigo ASC
		");

		$now = \Carbon\Carbon::now();

        foreach ($cargo as $data) 
        {
	    	DB::table('cargos')->insert(
	    		array(
	    			'descripcion' => strtoupper($data->Codigo),
					'detalle' => '',
	    			'vigencia' => 'S',
	        		'updated_at' => $now,
	        		'created_at' => $now,        			
	    		)
	    	);
    	}
    }
}
