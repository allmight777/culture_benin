<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Apply the migration updates.
     */
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {

            // 1. Renommer les colonnes si elles existent
            if (Schema::hasColumn('payments', 'id_utilisateur')) {
                $table->renameColumn('id_utilisateur', 'user_id');
            }

            if (Schema::hasColumn('payments', 'id_type_contenu')) {
                $table->renameColumn('id_type_contenu', 'content_type');
            }

            if (Schema::hasColumn('payments', 'id_contenu')) {
                $table->renameColumn('id_contenu', 'content_id');
            }

            if (Schema::hasColumn('payments', 'montant')) {
                $table->renameColumn('montant', 'amount');
            }
        });

        // 2. Appliquer les modifications de type et contraintes
        Schema::table('payments', function (Blueprint $table) {

            // S'assurer que user_id est une FK vers users
            if (!Schema::hasColumn('payments', 'user_id')) return;

            // Supprimer l'ancienne contrainte si nécessaire
            try {
                $table->dropForeign(['user_id']);
            } catch (\Exception $e) {
                // ignorer si aucune contrainte existante
            }

            // Recréer la contrainte FK propre
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            // Corriger les types
            $table->string('content_type')->change();
            $table->unsignedBigInteger('content_id')->change();
            $table->decimal('amount', 10, 2)->change();
        });
    }

    /**
     * Reverse changes.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {

            // revert column names
            if (Schema::hasColumn('payments', 'user_id')) {
                $table->renameColumn('user_id', 'id_utilisateur');
            }

            if (Schema::hasColumn('payments', 'content_type')) {
                $table->renameColumn('content_type', 'id_type_contenu');
            }

            if (Schema::hasColumn('payments', 'content_id')) {
                $table->renameColumn('content_id', 'id_contenu');
            }

            if (Schema::hasColumn('payments', 'amount')) {
                $table->renameColumn('amount', 'montant');
            }
        });
    }
};
