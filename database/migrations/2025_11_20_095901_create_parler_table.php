<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParlerTable extends Migration
{
    public function up()
    {
        Schema::create('parler', function (Blueprint $table) {
            $table->unsignedBigInteger('id_region');
            $table->unsignedBigInteger('id_langue');

            $table->primary(['id_region', 'id_langue']);

            $table->foreign('id_region')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('id_langue')->references('id')->on('langues')->onDelete('cascade');

            // optionnel : timestamps si tu veux savoir quand le lien a été créé
            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parler');
    }
}

