<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ficha', 12);  //->unique()
            $table->string('rut', 12);  //->unique()
            $table->string('digito_verificador', 1);
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('nombres');
            $table->string('direccion');
            $table->string('fecha_nacimiento', 8);
            $table->string('sexo', 1);
            $table->string('estado_civil', 1);
            $table->integer('id_pais')->unsigned();
            $table->foreign('id_pais')->references('id')->on('pais');            
            $table->string('codigo_empresa', 4);
            $table->foreign('codigo_empresa')->references('codigo')->on('empresas');
            $table->integer('id_cargo')->unsigned();
            $table->foreign('id_cargo')->references('id')->on('cargos');
            $table->integer('id_departamento')->unsigned();
            $table->foreign('id_departamento')->references('id')->on('departamentos');
            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->integer('id_lugar_pago')->unsigned();
            $table->foreign('id_lugar_pago')->references('id')->on('lugar_pagos'); 
            $table->string('telefono');
            $table->string('cuenta_corriente'); //->unique()
            $table->float('remuneracion', 24, 8);
            $table->string('numero_contrato', 12); // Verificar longitud al realizar migracion a produccion
            $table->string('fecha_ingreso', 8);
            $table->string('fecha_termino', 8);
            $table->string('vigencia', 1);
            $table->text('observaciones');
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
        Schema::dropIfExists('empleados');
    }
}
