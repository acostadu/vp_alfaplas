<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->string('codigo', 4)->primary();
            $table->string('rut', 12);
            $table->string('descripcion');
            $table->string('cod_legal_representante', 12);
            $table->string('representante_legal');
            $table->string('ciudad');
            $table->string('comuna');
            $table->string('direccion');
            $table->string('email');
            $table->string('giro');
            $table->string('razon');
            $table->string('moneda');
            $table->string('pais');
            $table->string('web');
            $table->string('modulo_digito');
            $table->string('verificador_digito');
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
        //Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('empresas');
        //Schema::enableForeignKeyConstraints();
    }
}
