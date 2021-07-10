<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->enum('option',['1','2'])->default('1');
            $table->integer('monto');
            $table->longText('description');

            $table->unsignedBigInteger('premise_id');
            $table->foreign('premise_id')->references('id')->on('premises');

            $table->enum('status',['0','1','2'])->default('1')->comment('0: Cancelado; 1:EnEspera; 2:Anulado');
            
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
        Schema::dropIfExists('wallets');
    }
}
