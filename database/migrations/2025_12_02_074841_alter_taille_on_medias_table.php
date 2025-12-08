<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('medias', function (Blueprint $table) {
            if (Schema::hasColumn('medias', 'taille')) {
                // convertir en varchar(100) nullable
                $table->string('taille', 100)->nullable()->change();
            } else {
                $table->string('taille', 100)->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('medias', function (Blueprint $table) {
            if (Schema::hasColumn('medias', 'taille')) {
                // rollback vers integer (par exemple) si tu veux ; sinon drop
                // $table->integer('taille')->nullable()->change();
                $table->dropColumn('taille');
            }
        });
    }
};
