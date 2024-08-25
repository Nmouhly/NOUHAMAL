<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOuvragesTableReplaceIdMemberWithIdUserr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ouvrages', function (Blueprint $table) {
            // Supprimer la contrainte de clé étrangère et la colonne existante
            $table->dropForeign(['id_user']);
            $table->dropColumn('id_user');

            // Ajouter la nouvelle colonne user_id
            $table->unsignedBigInteger('user_id')->after('pdf_link');

            // Définir la clé étrangère sur user_id
            $table->foreign('user_id')->references('user_id')->on('members')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('ouvrages', function (Blueprint $table) {
            // Supprimer la contrainte de clé étrangère et la colonne user_id
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            // Recréer la colonne id_user
            $table->unsignedBigInteger('id_user')->after('pdf_link');

            // Définir la clé étrangère sur id_user
            $table->foreign('id_user')->references('id')->on('members')->onDelete('cascade');
        });
    }
}
