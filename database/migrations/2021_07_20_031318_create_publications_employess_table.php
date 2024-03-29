<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsEmployessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_publications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publications_id');
            $table->unsignedBigInteger('employees_id');
            
            $table->foreign('publications_id')->references('id')->on('publications')->onDelete('cascade');
            $table->foreign('employees_id')->references('id')->on('employees')->onDelete('cascade');
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
        Schema::dropIfExists('employees_publications');
    }
}
