<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('evento');
            $table->longText('detalle')->nullable();
            $table->integer('costo_student')->nullable();
            $table->integer('costo_prof')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('imagen')->nullable();
            $table->string('link_whatsapp')->nullable();
            $table->string('link_telegram')->nullable();

            $table->enum('estado', [1,2])->default(1);

            // Llave foranea
            $table->unsignedBigInteger('id_expositor');
            $table->unsignedBigInteger('id_organizador');
            // Restrigcion de la llave foranea
            $table->foreign('id_expositor')->references('id')->on('exhibitors');
            $table->foreign('id_organizador')->references('id')->on('organizers');

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
        Schema::dropIfExists('events');
    }
}
