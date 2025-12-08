<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('medias', function (Blueprint $table) {
            $table->integer('taille')->nullable()->after('description')->comment('taille en Ko');
        });
    }

    public function down()
    {
        Schema::table('medias', function (Blueprint $table) {
            $table->dropColumn('taille');
        });
    }

};
