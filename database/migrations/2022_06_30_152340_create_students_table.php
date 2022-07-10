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
            $table->char('carnet_universitario', 8);
            $table->text('n_celular');
            $table->string('n_deposito');
            $table->string('img_deposito');

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
