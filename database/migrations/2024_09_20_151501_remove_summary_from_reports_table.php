<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveSummaryFromReportsTable extends Migration
{
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn('summary');
        });
    }

    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->string('summary')->nullable(); // Ou selon votre besoin
        });
    }
}
