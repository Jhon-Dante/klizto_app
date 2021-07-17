<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications_images', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('publications_id');
            $table->string('image');
            $table->enum('type',['1','0'])->comment('1: Imagen de portada; 2: Fotografía');
            $table->enum('status',['0','1','2'])->default('1')->comment('0: Inactivo; 1: Activo; 2: Eliminado;');

            $table->foreign('publications_id')->references('id')->on('publications');
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
        Schema::dropIfExists('publications_images');
    }
}
