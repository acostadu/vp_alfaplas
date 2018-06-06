<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresas = DB::connection('sqlsrv')->select('SELECT * FROM BDFlexline.security.SEG_EMPRESA');
       
        /*$view = View::make('adminlte::empresas')->with('empresas', $empresas);

        if($request->ajax()) 
        {
            $sections = $view->renderSections();
            return Response::json(array('success' => true, 'data' => $sections['window-modal'], 'modal' => '#empresaModal'));
        }
        else return $view;*/

        //$faker = Faker::create();
        //$connection2 = DB::connection('mysql');

        foreach ($empresas as $data) 
        {
        	DB::table('empresas')->insert(
        		array('codigo' => $data->EMPRESA, 'descripcion' => $data->DESCRIPCION, 'estado' => 0)
        	);

            /*DB::insert('INSERT INTO empresas (id, descripcion, estado) VALUES (?, ?, ?)', [
            	'id' => $data->EMPRESA, 
            	'descripcion' => $data->DESCRIPCION,
            	'estado' => 0
            ]);*/
    	}
    }
}
