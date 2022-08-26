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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_organizador')->nullable();
            // Restrigcion de la llave foranea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //Si un usuario se elimina por cascade todos los eventos que ese usuario creo se eliminaran tambien
            $table->foreign('id_organizador')->references('id')->on('organizers')->onDelete('set null'); // set null cuandi un organizador se elimina el valor que se le dara a ese campo sera de nulo

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
