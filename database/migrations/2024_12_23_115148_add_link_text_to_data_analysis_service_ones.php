<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinkTextToDataAnalysisServiceOnes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_analysis_service_ones', function (Blueprint $table) {
            $table->string('link_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_analysis_service_ones', function (Blueprint $table) {
            $table->dropColumn('link_text');
        });
    }
}
