<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id(); // id_region
            $table->string('nom_region', 100);
            $table->string('description', 255)->nullable();
            $table->unsignedBigInteger('population')->nullable();
            $table->decimal('superficie', 18, 2)->nullable(); // superficie: nombre décimal
            $table->string('localisation', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
