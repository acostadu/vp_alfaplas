<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('mes')->truncate();
        DB::table('empresas')->truncate();
        DB::table('prueba_mes')->truncate();
        // $this->call(UsersTableSeeder::class);
        $this->call(MesesTableSeeder::class);
        $this->call(EmpresasTableSeeder::class);
        $this->call(PruebaMesSeeder::class);
    }
}
