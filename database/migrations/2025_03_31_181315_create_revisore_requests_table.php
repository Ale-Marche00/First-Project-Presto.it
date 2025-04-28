<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Esegue la migrazione.
     */
    public function up()
    {
        Schema::create('revisore_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('in attesa'); // Stato: 'in attesa', 'approvato', 'rifiutato'
            $table->timestamps();
        });
    }

    /**
     * Annulla la migrazione.
     */
    public function down()
    {
        Schema::dropIfExists('revisore_requests');
    }
};
