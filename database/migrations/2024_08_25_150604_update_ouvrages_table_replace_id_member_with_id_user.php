<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOuvragesTableReplaceIdMemberWithIdUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ouvrages', function (Blueprint $table) {
            // Supprimer la colonne id_member
            $table->dropForeign(['id_member']);
            $table->dropColumn('id_member');

            // Ajouter la colonne id_user
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ouvrages', function (Blueprint $table) {
            // Supprimer la colonne id_user
            $table->dropForeign(['id_user']);
            $table->dropColumn('id_user');

            // Réajouter la colonne id_member
            $table->unsignedBigInteger('id_member')->nullable();
            $table->foreign('id_member')->references('id')->on('members')->onDelete('cascade');
        });
    }
}
