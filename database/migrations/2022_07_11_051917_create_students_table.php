<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('email')->unique();
            $table->char('carnet_identidad', 10);
            $table->char('carnet_universitario', 8)->nullable();
            $table->text('n_celular');
            $table->string('n_deposito')->nullable();
            $table->string('img_deposito')->nullable();

            //Es el estado del participante
            // 1 = estudiante
            // 2 = Profesional

            $table->enum('estado', ['estudiante', 'profesional']);
            $table->integer('costo_e')->nullable();

            //Llave foranea
            $table->unsignedBigInteger('id_evento');
            // Restrigcion de llave foranea
            $table->foreign('id_evento')->references('id')->on('events');

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
        Schema::dropIfExists('students');
    }
}
