<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->longText('detalle');

            //Llave foranea
            $table->unsignedBigInteger('id_evento');
            $table->unsignedBigInteger('id_participante');
            // Restrigcion de llave foranea
            $table->foreign('id_evento')->references('id')->on('events');
            $table->foreign('id_participante')->references('id')->on('students');

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
        Schema::dropIfExists('certificates');
    }
}
