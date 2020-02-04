<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_page', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('images_id')->nullable();
            $table->unsignedBigInteger('offer_works_id')->nullable();
            $table->string('title');
            $table->text('post');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('company');
            $table->foreign('images_id')->references('id')->on('images');
            $table->foreign('offer_works_id')->references('id')->on('company');
            $table->string('remember_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_page');
    }
}
