<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_user', function (Blueprint $table) {
            $table->id();

            // Llave foranea
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            // Restrigcion de la llave foranea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //Si un usuario se elimina por cascade todos los eventos que ese usuario creo se eliminaran tambien
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade'); //Si un usuario se elimina por cascade todos los eventos que ese usuario creo se eliminaran tambien

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
        Schema::dropIfExists('events_users_exhibitors');
    }
}
