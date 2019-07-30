<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors_counters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('browserId')->nullable();
            $table->string('browserName')->nullable();
            $table->string('browserVersion')->nullable();
            $table->string('userAgent')->nullable();
            $table->string('os')->nullable();
            $table->string('osVersion')->nullable();
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
        Schema::dropIfExists('visitors_counters');
    }
}
