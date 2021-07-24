<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('premise_id');
            $table->string('code');
            $table->string('img');
            //
            $table->time('date_ac_start');
            $table->time('date_ac_end');
            //
            $table->unsignedBigInteger('category_id');
            // $table->unsignedBigInteger('service_id');
            // $table->unsignedBigInteger('employee_id');
            $table->string('title');
            //
            $table->bigInteger('price');
            $table->bigInteger('discount');
            
            $table->longText('description')->nullable();
            // $table->text('description1');
            // $table->text('description2');
            // $table->text('description3');
            // $table->text('description4');
            //
            $table->enum('status',['0','1','2'])->default('1')->comment('0: Inactivo; 1: Activo; 2: Eliminado;');

            $table->foreign('premise_id')->references('id')->on('premises');
            $table->foreign('category_id')->references('id')->on('categories');
            // $table->foreign('service_id')->references('id')->on('services');
            // $table->foreign('employee_id')->references('id')->on('employees');

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
        Schema::dropIfExists('publications');
    }
}
