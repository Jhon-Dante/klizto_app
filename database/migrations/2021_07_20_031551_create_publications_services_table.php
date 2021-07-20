<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications_services', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('services_id');
            $table->unsignedBigInteger('publications_id');

            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('publications_id')->references('id')->on('publications')->onDelete('cascade');
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
        Schema::dropIfExists('publications_services');
    }
}
