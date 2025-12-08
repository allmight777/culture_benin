<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediasTable extends Migration
{
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->id(); // id_media
            $table->string('chemin', 255);
            $table->string('description', 255)->nullable();
            $table->foreignId('id_contenu')->nullable()->constrained('contenus')->nullOnDelete();
            $table->foreignId('id_type_media')->nullable()->constrained('type_medias')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medias');
    }
}
