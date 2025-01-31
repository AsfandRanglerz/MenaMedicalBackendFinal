<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationPersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_personal_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quotation_request_id');
            $table->foreign('quotation_request_id')->references('id')->on('quotation_requests')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('study_category');
            $table->string('other_study_category');
            $table->string('institute_name');
            $table->string('location');
            $table->string('question');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation_personal_infos');
    }
}
