<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguesTable extends Migration
{
    public function up()
    {
        Schema::create('langues', function (Blueprint $table) {
            $table->id(); // id_langue
            $table->string('nom_langue', 50);
            $table->string('code_langue', 10)->nullable();
            $table->string('description', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('langues');
    }
}
