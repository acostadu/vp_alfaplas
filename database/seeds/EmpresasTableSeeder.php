<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use App\Empresa;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresa = DB::connection('sqlsrv')->select('SELECT * FROM BDFlexline.security.SEG_EMPRESA');

        foreach ($empresa as $data) 
        {

			//$empresas = Empresa::all();
			//$user = DB::table('users')->where('name', 'John')->first();
			$config = DB::connection('sqlsrv')->select("
				SELECT EMPRESA, TIPO, CODIGO, NEMOTECNICO, DESCRIPCION, TEXTO, TEXTO1
				FROM BDFlexline.flexline.GEN_TABCOD gt
				WHERE gt.empresa = '".$data->EMPRESA."' AND gt.tipo = 'CONFIG.EMPRESA' AND CODIGO != 'CODACTIVIDAD'
				ORDER BY [CODIGO] ASC
			");

			//$configArray = [];

			foreach ($config as $codigo) 
    		{
    			if ($configArray[$codigo->CODIGO] = 'GIRO')
    				$configArray[$codigo->CODIGO] = strtoupper($codigo->TEXTO.$codigo->TEXTO1);
    			else
    				$configArray[$codigo->CODIGO] = strtoupper($codigo->TEXTO);
    		}

			//echo $user->name;
			$now = \Carbon\Carbon::now();			

        	DB::table('empresas')->insert(
        		array(
        			'codigo' => $data->EMPRESA, 
        			'rut' => str_replace(".", "", $configArray['CODLEGAL']), 
        			'descripcion' => $data->DESCRIPCION,
        			'cod_legal_representante' => str_replace(".", "", $configArray['CODLEGALREP']),
        			'representante_legal' => $configArray['REPLEGAL'],
        			'ciudad' => $configArray['CIUDAD'],
        			'comuna' => $configArray['COMUNA'],
        			'direccion' => $configArray['DIRECCION'],
        			'email' => $configArray['EMAIL'],
        			'giro' => $configArray['GIRO'],
        			'razon' => $configArray['RAZON'],
        			'moneda' => $configArray['MONEDA'],
        			'pais' => $configArray['PAIS'],
        			'web' => $configArray['WEB'],
        			'modulo_digito' => $configArray['MODULO.DIGITO'],
        			'verificador_digito' => $configArray['USADIGITO'],
        			'vigencia' => 0,
            		'updated_at' => $now,
            		'created_at' => $now,        			
        		)
        	);

            /*DB::insert('INSERT INTO empresas (id, descripcion, estado) VALUES (?, ?, ?)', [
            	'id' => $data->EMPRESA, 
            	'descripcion' => $data->DESCRIPCION,
            	'estado' => 0
            ]);*/
    	}
    }
}
