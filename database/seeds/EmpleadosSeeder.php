<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

//use App\Cargo;

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

		$cargos = DB::table('cargos')->get();
		$departamentos = DB::table('departamentos')->get();
		$categorias = DB::table('categorias')->get();
		$lugar_pagos = DB::table('lugar_pagos')->get();
		$paises = DB::table('pais')->get();

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

        	//Cargos
	        foreach ($cargos as $data_cargo) 
	        {
    			if($data_cargo->descripcion == $data->CARGO)
    				$cargo = $data_cargo->id;
	        }

	        //Departamentos
	        foreach ($departamentos as $data_dpto) 
	        {
    			if($data_dpto->codigo == $data->DEPARTAMENTO)
    				$departamento = $data_dpto->id;
	        }

	        // Categorias
	        foreach ($categorias as $data_cat) 
	        {
    			if($data_cat->codigo == $data->CATEGORIA)
    				$categoria = $data_cat->id;
	        }

	        // Lugar Pagos
	        foreach ($lugar_pagos as $data_lpago) 
	        {
    			if($data_lpago->descripcion == $data->LUGAR_PAGO) {
    				$lpago = $data_lpago->id;
    				break;
    			}
    			else {
    				$lpago = 2;
    			}
	        }

	        // Paises	        	        	        
	        foreach ($paises as $data_pais) 
	        {
    			if($data_pais->descripcion == $data->NACION) {
    				$pais = $data_pais->id;
    				break;
    			}
    			else {
    				$pais = 246;
    			}
	        }       	

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
	    			'sexo' => strtoupper($data->SEXO),
	    			'estado_civil' => strtoupper($data->ESTADO_CIVIL),
	    			'id_pais' => $pais,	    			
	    			'codigo_empresa' => strtoupper($data->EMPRESA),
	    			'id_cargo' => $cargo,
	    			'id_departamento' => $departamento,
	    			'id_categoria' => $categoria,
	    			'id_lugar_pago' => $lpago,
	    			'telefono' => $data->TELEFONO,
	    			'cuenta_corriente' => $data->CUENTA_CORRIENTE,
	    			'remuneracion' => $data->REMUNERACION,
	    			'numero_contrato' => $data->NUMERO_CONTRATO,
	    			'fecha_ingreso' => $data->FECHA_INICIO,
	    			'fecha_termino' => $data->FECHA_TERMINO,
	    			'vigencia' => (strtoupper($data->VIGENCIA) == 'ACTIVO') ? 'S' : 'N',
	    			'observaciones' => strtoupper($data->OBSERVACIONES),
	        		'updated_at' => $now,
	        		'created_at' => $now,        			
	    		)
	    	);
    	}
    }
}
