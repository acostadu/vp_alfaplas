<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MesesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();

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

        foreach ($arrayMes as $mes) 
        {
            DB::table('mes')->insert(
                array(
                    'descripcion' => strtoupper($mes),
                    'created_at' => $now,
                    'updated_at' => $now                    
                )
            );
        }

    }
}
