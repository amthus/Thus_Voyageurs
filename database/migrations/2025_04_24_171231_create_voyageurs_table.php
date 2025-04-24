<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('voyageurs', function (Blueprint $table) {
            $table->id('id_voyageur');
            $table->string('nom');
            $table->string('prenom');
            $table->string('ville');
            $table->enum('genre', ['masculin', 'feminin']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('voyageurs');
    }
};