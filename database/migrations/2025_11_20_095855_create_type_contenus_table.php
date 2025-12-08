<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeContenusTable extends Migration
{
    public function up()
    {
        Schema::create('type_contenus', function (Blueprint $table) {
            $table->id(); // id_type_contenu
            $table->string('nom_contenu', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_contenus');
    }
}

