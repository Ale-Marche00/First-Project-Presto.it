<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Esegui la migrazione.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Aggiungere nuovi campi
            $table->string('phone')->nullable()->after('email');  // Numero di telefono
            $table->text('biography')->nullable()->after('phone'); // Biografia
            $table->string('linkedin')->nullable()->after('biography'); // URL LinkedIn
            $table->string('twitter')->nullable()->after('linkedin'); // URL Twitter
            $table->string('website')->nullable()->after('twitter'); // URL sito web personale
        });
    }

    /**
     * Reverti la migrazione.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Rimuovere i campi aggiunti in caso di rollback
            $table->dropColumn(['phone', 'biography', 'linkedin', 'twitter', 'website']);
        });
    }
}
