<?php

use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamento = DB::connection('sqlsrv')->select("
			SELECT DISTINCT CODIGO, ALIAS, NOMBRE, DEPENDENCIA, DESCRIPCION
			FROM BDFlexline.flexline.PER_DEPARTAMENTO d
			WHERE DEPENDENCIA IN ('0', '1')
			ORDER BY CODIGO
		");

		$now = \Carbon\Carbon::now();

        foreach ($departamento as $data) 
        {
	    	DB::table('departamentos')->insert(
	    		array(
	    			'descripcion' => strtoupper($data->ALIAS),
					'detalle' => strtoupper($data->NOMBRE),
	    			'codigo' => strtoupper($data->CODIGO),	    			
	    			'vigencia' => 'S',
	        		'updated_at' => $now,
	        		'created_at' => $now,        			
	    		)
	    	);
    	}		    	


    }
}
