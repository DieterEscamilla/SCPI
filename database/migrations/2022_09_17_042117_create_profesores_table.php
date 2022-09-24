<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()        
    {
        Schema::create('profesores', function (Blueprint $table) {/*FK DE USUARIO. Puede ser el número de tarjeta si es único */
            $table->string('nombre',40);
            $table->string('primerApellido',60);
            $table->string('segundoApellido',60);
            $table->date('fechaNacimiento');/*Verificar en la documentación el tipo de campo para las fechas */
            $table->date('fechaIngresoSep');/*Verificar en la documentación el tipo de campo para las fechas */
            $table->date('fechaIngresoInstitucion');
            $table->string('areaAdscripcion',255);
            $table->string('gradoEscolar',70);
            $table->string('rfc',50);
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
        Schema::dropIfExists('profesor');
    }
}
