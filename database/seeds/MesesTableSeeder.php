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
        $faker = Faker::create();

        foreach (range(2018,2030) as $index) {
            DB::table('mes')->insert(array('descripcion' => $index, 'estado' => 0));
    	}

        //$faker->monthName($max = 'now')

    }
}
