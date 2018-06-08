<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = DB::connection('sqlsrv')->select("
			SELECT DISTINCT gt.Codigo, gt.Nemotecnico, gt.Descripcion
			FROM BDFlexline.flexline.GEN_TABCOD gt
			WHERE gt.tipo = 'PER_CATEGO'
			ORDER BY gt.Codigo ASC
		");

		$now = \Carbon\Carbon::now();

        foreach ($categorias as $data) 
        {
	    	DB::table('categorias')->insert(
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
