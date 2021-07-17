<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches_employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branches_id');
            $table->unsignedBigInteger('employees_id');

            $table->foreign('branches_id')->references('id')->on('branches')->onDelete('cascade');
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
        Schema::dropIfExists('branch_employee');
    }
}
