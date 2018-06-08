<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleados = DB::connection('sqlsrv')->select("SELECT * FROM BDFlexline.flexline.PER_TRABAJADOR t");

		$now = \Carbon\Carbon::now();

        foreach ($empleados as $data) 
        {
        	$digito_verificador = strtoupper($data->DV_EMPLEADO);
    		//str_replace(".", "", ),
    		$ficha 	= explode("-", $data->FICHA);
    		$rut 	= explode("-", $data->EMPLEADO);
			$ficha_empleado 	= $ficha[0];
			$rut_empleado 		= $rut[0];    		

        	//if ($digito_verificador >= 0 || $digito_verificador == 'K') {
        	if (count($ficha) > 1) 
        	{
    			$ficha_empleado 	= $ficha[0];
    			$rut_empleado 		= $rut[0];
    			$digito_verificador = strtoupper($ficha[1]);

   			
        	} 
        	else if (count($rut) > 1) 
        	{
    			$rut_empleado 		= $rut[0];
    			$ficha_empleado 	= $ficha[0];
    			$digito_verificador = strtoupper($rut[1]);
        	} 
        	/*else {

        		if (count($ficha) > 1) {
        			$rut_empleado 		= $rut[0];
        			$ficha_empleado 	= $ficha[0];
        			$digito_verificador = $ficha[1];
        		}
        		else {
        			$rut_empleado 		= $rut[0];
        			$ficha_empleado 	= $ficha[0];
        			$digito_verificador = $rut[1];
        		}        		
        	}*/

	    	DB::table('empleados')->insert(
	    		array(
	    			'ficha' => $ficha_empleado,
	    			'rut' => $rut_empleado,
	    			'digito_verificador' => $digito_verificador,
	    			'apellido_paterno' => strtoupper($data->APELLIDO_PATERNO),
	    			'apellido_materno' => strtoupper($data->APELLIDO_MATERNO),
	    			'nombres' => strtoupper($data->NOMBRE),
	    			'direccion' => strtoupper($data->DIRECCION),
	    			'fecha_nacimiento' => strtoupper($data->FECHA_NACIMIENTO),
	    			'vigencia' => (strtoupper($data->VIGENCIA) == 'ACTIVO') ? 'S' : 'N',
	        		'updated_at' => $now,
	        		'created_at' => $now,        			
	    		)
	    	);
    	}
    }
}
