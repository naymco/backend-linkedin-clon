<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('offer_works_id')->nullable();
            $table->unsignedBigInteger('state_add_id')->nullable();
            $table->string('state')->nullable();
            $table->boolean('visible_user')->nullable();
            $table->boolean('visible_company')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('offer_works_id')->references('id')->on('offer_works');
            $table->foreign('state_add_id')->references('id')->on('state_add');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request');
    }
}
