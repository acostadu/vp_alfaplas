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

    	//DB::table('mes')->truncate();
        //DB::table('empresas')->truncate();
        //DB::table('prueba_mes')->truncate();
        // $this->call(UsersTableSeeder::class);
        //$this->call(MesesTableSeeder::class);
        //$this->call(PruebaMesSeeder::class);
        $this->call(TipoClientesSeeder::class);
        $this->call(PaisesSeeder::class);
        $this->call(MonedasSeeder::class);
        $this->call(CentroCostosSeeder::class);
        $this->call(ComunasRegionesSeeder::class);
        $this->call(BancosSeeder::class);
        $this->call(CargosSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(EmpresasTableSeeder::class);
        $this->call(LugarPagoSeeder::class);
        $this->call(EmpleadosSeeder::class);
    }
}
