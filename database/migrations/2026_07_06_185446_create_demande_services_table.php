<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\StatutDemande;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demande_services', function (Blueprint $table) {
            $table->id('idDmdeService');
            $table->foreignId('user_id')->references('idUser')->on('users')->onDelete('cascade');
            $table->foreignId('service_id')->references('idService')->on('services')->onDelete('cascade');
            $table->date('dateCommande');
            $table->enum('statut_demande', array_column(StatutDemande::cases(),'value'))->default(StatutDemande::EN_ATTENTE->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_services');
    }
};
