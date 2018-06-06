<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PruebaMesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$faker = Faker::create();
        
        $arrayMes = array(
        	'Enero',
        	'Febrero',
        	'Marzo',
        	'Abril',
        	'Mayo',
        	'Junio',
        	'Julio',
        	'Agosto',
        	'Septiembre',
        	'Octubre',
        	'Noviembre',
        	'Diciembre'
        );

        foreach ($arrayMes as $mes) {
            DB::table('prueba_mes')->insert(array('descripcion' => $mes));
    	}

        //$faker->monthName($max = 'now')
    }
}
