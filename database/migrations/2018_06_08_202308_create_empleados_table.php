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
            $table->string('ficha', 12);
            $table->string('rut', 12);
            $table->string('digito_verificador', 1);
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('nombres');
            $table->string('direccion');
            $table->string('fecha_nacimiento', 8);
            $table->string('vigencia', 1);
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
