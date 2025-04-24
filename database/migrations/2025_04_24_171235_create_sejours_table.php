<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sejours', function (Blueprint $table) {
            $table->id('id_sejour');
            $table->unsignedBigInteger('id_voyageur');
            $table->date('debut');
            $table->date('fin');
            $table->timestamps();
            
            $table->foreign('id_voyageur')
                  ->references('id_voyageur')
                  ->on('voyageurs')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sejours');
    }
};