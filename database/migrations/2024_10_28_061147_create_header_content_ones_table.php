<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderContentOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_content_ones', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable(); // for storing icon path or name
            $table->string('text')->nullable(); // for the text content
            $table->string('url')->nullable(); // for the URL link
            $table->boolean('status')->default(0); // for active/inactive status, default is active
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
        Schema::dropIfExists('header_content_ones');
    }
}
