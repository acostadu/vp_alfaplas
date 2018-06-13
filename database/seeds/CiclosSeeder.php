<?php

use Illuminate\Database\Seeder;

class CiclosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$now = \Carbon\Carbon::now();

        foreach (range(2018,2030) as $index) {
            DB::table('ciclos')->insert(
            	array(
            		'descripcion' => $index, 
            		'estado' => 0,
            		'created_at' => $now,
            		'updated_at' => $now
            	)
            );
    	}
    }
}
