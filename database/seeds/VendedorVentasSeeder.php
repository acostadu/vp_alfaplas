<?php

use Illuminate\Database\Seeder;

class VendedorVentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ventas = DB::connection('sqlsrv')->select("
			SELECT *
			FROM BDFlexline.dbo.tmp_g1 a 
			WHERE a.empresa = '001' AND a.tipodocto 
			IN ('FACTURA VENTA (FE)', 'N. CRDTO VENTA (FE)', 'BOLETA VENTA (FE)', 'FACTURA EXPORTACION') 
			AND a.fecha BETWEEN '2018-01-04' AND '2018-31-05'
			ORDER BY a.Vendedor ASC
		");

		$now = \Carbon\Carbon::now();

        foreach ($ventas as $data) 
        {
	    	DB::table('vendedor_ventas')->insert(
	    		array(
					'Empresa' => $data->Empresa,
					'Tipodocto' => $data->Tipodocto,
					'TipoCtaCte' => $data->TipoCtaCte,
					'Correlativo' => $data->Correlativo,
					'Numero' => $data->Numero,
					'Cliente' => $data->Cliente,
					'Proveedor' => $data->Proveedor,
					'RazonSocial' => $data->RazonSocial,
					'Ejecutivo' => $data->Ejecutivo,
					'Vendedor' => $data->Vendedor,
					'Fecha' => $data->Fecha,
					'Bodega' => $data->Bodega,
					'Producto' => $data->Producto,
					'Secuencia' => $data->Secuencia,
					'Glosa' => $data->Glosa,
					'Factormonto' => $data->Factormonto,	
					'Cantidad' => $data->Cantidad,
					'Precio' => $data->Precio,
					'Neto' => $data->Neto,
					'Costo' => $data->Costo,
					'Utilidad' => $data->Utilidad,
					'Peso' => $data->Peso,
					'Pesototal' => $data->Pesototal,
					'Tipo' => $data->Tipo,
					'Subtipo' => $data->Subtipo,
					'Familia' => $data->Familia,
					'Subfamilia' => $data->Subfamilia,
					'Vigencia' => $data->Vigencia,
					'fechames' => $data->fechames,				
					'fechaano' => $data->fechaano,				
					'tipodoctoorigen' => $data->tipodoctoorigen,
					'updated_at' => $now,
					'created_at' => $now       			
	    		)
	    	);
    	}				

        /*
        $ventas = array_map(function($ventas) use ($now) {
           	return [
				'Empresa' => $ventas->Empresa,
				'Tipodocto' => $ventas->Tipodocto,
				'TipoCtaCte' => $ventas->TipoCtaCte,
				'Correlativo' => $ventas->Correlativo,
				'Numero' => $ventas->Numero,
				'Cliente' => $ventas->Cliente,
				'Proveedor' => $ventas->Proveedor,
				'RazonSocial' => $ventas->RazonSocial,
				'Ejecutivo' => $ventas->Ejecutivo,
				'Vendedor' => $ventas->Vendedor,
				'Fecha' => $ventas->Fecha,
				'Bodega' => $ventas->Bodega,
				'Producto' => $ventas->Producto,
				'Secuencia' => $ventas->Secuencia,
				'Glosa' => $ventas->Glosa,
				'Factormonto' => $ventas->Factormonto,	
				'Cantidad' => $ventas->Cantidad,
				'Precio' => $ventas->Precio,
				'Neto' => $ventas->Neto,
				'Costo' => $ventas->Costo,
				'Utilidad' => $ventas->Utilidad,
				'Peso' => $ventas->Peso,
				'Pesototal' => $ventas->Pesototal,
				'Tipo' => $ventas->Tipo,
				'Subtipo' => $ventas->Subtipo,
				'Familia' => $ventas->Familia,
				'Subfamilia' => $ventas->Subfamilia,
				'Vigencia' => $ventas->Vigencia,
				'fechames' => $ventas->fechames,				
				'fechaano' => $ventas->fechaano,				
				'tipodoctoorigen' => $ventas->tipodoctoorigen,
				'updated_at' => $now,
				'created_at' => $now,
           ];
        }, $ventas);

        \DB::table('vendedor_ventas')->insert($ventas);
        */		

    }
}
