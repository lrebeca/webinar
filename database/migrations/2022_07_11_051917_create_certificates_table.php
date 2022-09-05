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

        Schema::create('images', function (Blueprint $table) {
            $table->id();

            $table->string('imagen');

            $table->timestamps();
        });

        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->longText('detalle');
            $table->date('fecha');

            //Llave foranea
            $table->unsignedBigInteger('id_evento');
            $table->unsignedBigInteger('image_id');
            // Restrigcion de llave foranea
            $table->foreign('id_evento')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');// Si una imagen se elimina se eliminaran todos los certificados que pertenecen a esa imagen 

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

        Schema::dropIfExists('images');

        Schema::dropIfExists('certificates');
    }
}