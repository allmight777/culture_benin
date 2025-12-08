<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // Utilisateur qui a payé
            $table->foreignId('id_utilisateur')
                ->constrained()
                ->onDelete('cascade');

            // ID de la transaction côté FedaPay (peut être null si accès gratuit)
            $table->string('transaction_id')->nullable();

            // Contenu concerné
            $table->string('id_type_contenu');          // article, video, podcast, interview...
            $table->unsignedBigInteger('id_contenu'); // ID du contenu dans sa table

            // Montant payé (en FCFA)
            $table->decimal('montant', 10, 2);

            // Statut du paiement
            // pending   => en attente
            // completed => payé
            // failed    => échoué / annulé
            $table->string('status')->default('pending');

            // Métadonnées (stocke token Fedapay, titre du contenu, etc.)
            $table->json('metadata')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
