<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('sexo');
            $table->integer('fallecido');

            $table->unsignedBigInteger('id_mes');
            $table->unsignedBigInteger('id_region');
         

            $table->foreign('id_mes')->references('id')->on('mes');
            $table->foreign('id_region')->references('id')->on('regiones');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casos');
    }
};
