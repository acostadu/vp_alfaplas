<?php

use Illuminate\Database\Seeder;

class TipoClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 	    $now = \Carbon\Carbon::now();
 		
        $tipo_clientes = [
            [1, 'CLIENTE', 'CLIENTES'],
            [2, 'PROVEEDOR', 'PROVEEDORES']
        ];
        
        $tipo_clientes = array_map(function($tipo_clientes) use ($now) {
           return [
               'id' => $tipo_clientes[0],
               'descripcion' => $tipo_clientes[1],
               'detalles' => $tipo_clientes[2],
               'updated_at' => $now,
               'created_at' => $now,
           ];
        }, $tipo_clientes);

        \DB::table('tipo_clientes')->insert($tipo_clientes);
    }
}
