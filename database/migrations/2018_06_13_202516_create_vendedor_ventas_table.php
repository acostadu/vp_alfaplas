<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendedorVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendedor_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Empresa', 20);
            $table->string('Tipodocto', 40);
            $table->string('TipoCtaCte', 20);
            $table->float('Correlativo', 9, 0);
            $table->string('Numero', 20);
            $table->string('Cliente', 20);
            $table->string('Proveedor', 20);
            $table->string('RazonSocial', 75);
            $table->string('Ejecutivo', 20);
            $table->string('Vendedor', 20);
            $table->dateTime('Fecha');
            $table->string('Bodega', 20);
            $table->string('Producto', 20);
            $table->float('Secuencia', 6, 0);
            $table->string('Glosa', 50);
            $table->integer('Factormonto');
            $table->float('Cantidad', 22, 8);
            $table->float('Precio',22, 8);
            $table->float('Neto', 22, 8);
            $table->float('Costo', 22, 8);
            $table->float('Utilidad', 22, 8);
            $table->float('Peso', 22, 8);
            $table->float('Pesototal', 22, 8);
            $table->string('Tipo', 50);
            $table->string('Subtipo', 50);
            $table->string('Familia', 50);
            $table->string('Subfamilia', 50);
            $table->string('Vigencia', 1);
            $table->string('fechames', 2);
            $table->string('fechaano', 4);
            $table->string('tipodoctoorigen', 40);
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendedor_ventas');
    }
}
