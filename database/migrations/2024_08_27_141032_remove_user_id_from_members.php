<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUserIdFromMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            // Supprimer la contrainte de clé étrangère si elle existe
            $table->dropForeign(['user_id']);
            
            // Supprimer l'index si nécessaire
            $table->dropIndex(['user_id']);
            
            // Supprimer la colonne user_id
            $table->dropColumn('user_id');
        });
    }

    /**
     * Revenir en arrière les migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            // Recréer la colonne user_id
            $table->unsignedBigInteger('user_id')->nullable();
            
            // Recréer l'index et la contrainte de clé étrangère
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }
}
