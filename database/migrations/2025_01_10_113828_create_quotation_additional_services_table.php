<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationAdditionalServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_additional_services', function (Blueprint $table) {
            $table->id();$table->unsignedBigInteger('quotation_request_id');
            $table->foreign('quotation_request_id')->references('id')->on('quotation_requests')->onDelete('cascade');
            $table->string('service');
            $table->string('service_price');
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
        Schema::dropIfExists('quotation_additional_services');
    }
}
