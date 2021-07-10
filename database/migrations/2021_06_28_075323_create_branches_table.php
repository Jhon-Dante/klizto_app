<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->longText('direction');
            $table->bigInteger('phone');

            $table->unsignedBigInteger('premise_id');
            $table->foreign('premise_id')->references('id')->on('premises');

            $table->enum('status',['0','1','2'])->default('1')->comment('0: Inactivo; 1: Activo; 2: Eliminado;');

            $table->enum('principal',['1','0'])->default('1')->comment('1: Principal; 0: Sucursal');
            
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
        Schema::dropIfExists('branches');
    }
}
