<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function(Blueprint $table){
            $table->id();
            $table->string('provincia');
            $table->string('info');
            $table->timestamps();

        });

        Schema::create('organizers', function (Blueprint $table) {
            $table->id();
            $table->string('unidad');
            $table->string('detalle');

            // Llave foranea
            $table->unsignedBigInteger('province_id');
            // Restrigcion de la llave foranea
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade'); //Si un usuario se elimina por cascade todos los eventos que ese usuario creo se eliminaran tambien
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
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('organizers');
    }
}
