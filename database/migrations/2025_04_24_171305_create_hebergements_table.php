<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hebergements', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('capacite');
            $table->string('type');
            $table->string('lieu');
            $table->string('photo')->nullable();
            $table->boolean('disponible');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hebergements');
    }
};