<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MonedasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 	    $now = \Carbon\Carbon::now();
 		
        $monedas = [
            [1,'Peso Chileno','$', 'CLP', 'Centavo', '100', 'PS'],
            [2,'Dolar Estadounidense','$', 'USD', 'Centavo', '100', 'DL'],
            [3,'Euro','€', 'EUR', 'Cent', '100', 'EURO'],
            [4,'Peso Argentino','€', 'ARS', 'Centavo', '100', ''],
            [5,'Guaraní Paraguayo','₲', 'PYG', 'Céntimo', '100', ''],
            [6,'Peso Uruguayo','$', 'UYU', 'centésimo', '100', ''],
            [7,'Real Brasileño','R$', 'BRL', 'Centavo', '100', ''],
            [8,'Peso Colombiano','$', 'COP', 'Centavo', '100', ''],
            [9,'Bolívar','Bs.F', 'VEF', 'Céntimo', '100', ''],
            [10,'Nuevo Sol','S/.', 'PEN', 'Céntimo', '100', ''],
            [11,'Boliviano', 'Bs.', 'BOB', 'Centavo', '100', ''],
            [12,'Yen', '¥', 'JPY', 'Sen', '100', ''],
            [13,'Unidad Fomento', 'UF', 'CLF', '', '', ''],
            [14,'Unidad Tributaria Mensual', 'UTM', 'UTM', '', '', '']
        ];
        
        $monedas = array_map(function($monedas) use ($now) {
           return [
               'id' => $monedas[0],
               'unidad_monetaria' => $monedas[1],
               'simbolo' => $monedas[2],
               'codigo_iso' => $monedas[3],
               'unidad_fraccionaria' => $monedas[4],
               'numero_base' => $monedas[5],
               'codigo_antiguo' => $monedas[6],
               'updated_at' => $now,
               'created_at' => $now,
           ];
        }, $monedas);

        \DB::table('monedas')->insert($monedas);
    }
}
