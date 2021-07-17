<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications_descriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publications_id');
            $table->string('description');
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
        Schema::dropIfExists('publications_descriptions');
    }
}
