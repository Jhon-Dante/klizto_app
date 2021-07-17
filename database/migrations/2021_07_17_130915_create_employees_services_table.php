<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('services_id');
            $table->unsignedBigInteger('employees_id');

            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('employees_services');
    }
}
